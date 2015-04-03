<?php
namespace Clean\Data;

class Collection extends \ArrayIterator
{
    public function __construct($data = null)
    {
        parent::__construct([]);
        if ($data) {
            $this->appendArray($data);
        }
    }

    public function __call($name, $args)
    {
        if ($this->count() > 1) {
            throw new \LogicException("Collection has more then one element, you cannot call entity method directly");
        }
        $current = $this->first();
        if (!$current) {
            throw new \LogicException("Cannot operate on empty collection");
        }
        return call_user_func_array(array($current, $name), $args);
    }

    public function __get($name)
    {
        if ($this->count() > 1) {
            throw new \LogicException("Collection has more then one element, you cannot get entity property directly");
        }
        $current = $this->first();
        if (!$current) {
            return null;
        }
        return $current->$name;
    }

    public function first()
    {
        $this->rewind();
        return $this->current();
    }

    public function last()
    {
        $this->seek($this->count()-1);
        $entity = $this->current();
        $this->rewind();
        return $entity;
    }

    public function getAllValuesForProperty($name, $asCollection = false)
    {
        $ids = array();
        foreach ($this as $entity) {
            $value = $entity->$name;

            if ($value instanceof Collection && $value->isEmpty()) {
                continue;
            }

            if (null === $value) {
                continue;
            }

            if (is_scalar($value)) {
                $ids[$value] = $value;
            } else {
                $ids[] = $value;
            }
        }

        if ($asCollection) {
            return new self(array_values($ids));
        } else {
            return array_values($ids);
        }
    }

    /**
     * append array values to collection
     *
     * @param array $data
     * @access public
     * @return this
     */
    public function appendArray($data)
    {
        if (is_array($data) || $data instanceof \Traversable) {
            foreach ($data as $value) {
                $this->append($value);
            }
        } else {
            throw new \InvalidArgumentException("Invalid argument supplied to method. Must be array or implement Traversable interface");
        }
        return $this;
    }

    /**
     * returns random value from collection
     *
     * @return Colection element
     */
    public function getRandom()
    {
        $random_key = array_rand($this->getArrayCopy());
        return $this[$random_key];
    }


    /**
     * Order collection elements by some property
     *
     * @param string $element
     * @param string $order desc|asc
     * @access public
     * @return void
     */
    public function orderBy($element, $order = 'asc')
    {
        $this->uasort(
            function ($a, $b) use ($element, $order) {
                $m = ($order == 'desc') ? -1 : 1;

                if (is_object($a) && is_object($b)) {
                    if ($element instanceof \Closure) {
                        $valueA = $element($a);
                        $valueB = $element($b);
                    } else {
                        $valueA = $a->$element;
                        $valueB = $b->$element;
                    }
                } else if (is_array($a) && is_array($b)) {
                    $valueA = $a[$element];
                    $valueB = $b[$element];
                } else {
                    throw new \InvalidArgumentException(sprintf("Collection can't be sorted it contains invalid data type: %s", gettype($a)));
                }
                return  ($valueA > $valueB ? 1*$m : ($valueA < $valueB ? -1*$m : 0));
            }
        );
        $this->rewind();
        return $this;
    }

    public function orderTree($childProperty, $parentProperty)
    {
        $this->uasort(
            function ($a, $b) use ($childProperty, $parentProperty) {
                if (!$a->$parentProperty) {
                    return -1;
                }

                return ($a->$childProperty == $b->$parentProperty) ? -1 : 1;
            }
        );
        $this->rewind();
        return $this;
    }

    public function order($sort)
    {
        $this->uasort($sort);
        $this->rewind();
        return $this;
    }

    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }

    public function isEmpty()
    {
        return (0 === $this->count());
    }

    public function getNext()
    {
        if (!is_int($this->key())) {
            throw new \LogicException("Can't get next element from not numeric ordered collection");
        }
        if ($this->offsetExists($this->key() + 1)) {
            return $this->offsetGet($this->key() + 1);
        }
    }

    public function getPrevious()
    {
        if (!is_int($this->key())) {
            throw new \LogicException("Can't get previous element from not numeric ordered collection");
        }
        if ($this->offsetExists($this->key() - 1)) {
            return $this->offsetGet($this->key() - 1);
        }
    }

    /**
     * @deprecated use first() method instead
     */
    public function getFirst()
    {
        if ($this->offsetExists(0)) {
            return $this->offsetGet(0);
        }

        return null;
    }

    public function groupByField($name, $callback = null)
    {
        $class = get_called_class();
        $collection = new $class;
        foreach ($this as $entity) {
            if ($entity->$name === null) {
                continue; //when entity dosen't have set property with this name it will be omitted
            }

            $value = $entity->$name;
            if (is_callable($callback)) {
                $value = $callback($value);
            }

            if (!isset($collection[$value])) {
                $collection[$value] = new $class(array($entity));
            } else {
                $collection[$value]->append($entity);
            }
        }
        return $collection;
    }

    public function filterBy($field, $value, $operator = '=')
    {
        $class = get_called_class();
        $collection = new $class;

        $arrayValue = is_array($value) ? $value : array($value);

        foreach ($this as $key => $entity) {
            if ($operator == '=' || $operator == '~') {
                if (in_array($entity->$field, $arrayValue, ($operator == '=') ? true : false)) {
                    $collection[$key] = $entity;
                }
            } else if ($operator == '!=') {
                if (!in_array($entity->$field, $arrayValue, true)) {
                    $collection[$key] = $entity;
                }
            } else if ($operator == '>') {
                if ($entity->$field > $value) {
                    $collection[$key] = $entity;
                }
            } else if ($operator == '>=') {
                if ($entity->$field >= $value) {
                    $collection[$key] = $entity;
                }
            } else if ($operator == '<') {
                if ($entity->$field < $value) {
                    $collection[$key] = $entity;
                }
            } else if ($operator == '<=') {
                if ($entity->$field <= $value) {
                    $collection[$key] = $entity;
                }
            } else {
                throw new \InvalidArgumentException("Invalid operator used: '$operator'");
            }
        }
        return $collection;
    }

    public function filter(\Closure $callback)
    {
        $class = get_called_class();
        $collection = new $class;

        foreach ($this as $key => $entity) {
            if ($callback($entity)) {
                $collection[$key] = $entity;
            }
        }

        return $collection;
    }

    public function has($field, $value)
    {
        $value = is_array($value) ? $value : array($value);
        foreach ($this as $entity) {
            if (in_array($entity->$field, $value, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns new Collection object with all entities in which 'field' property is not empty
     *
     * @param string $field
     * @param bool   $strict
     *
     * @return Collection
     */
    public function filterOutEmpty($field, $strict = true)
    {
        $class = get_called_class();
        $collection = new $class;

        foreach ($this as $entity) {

            if (!isset($entity->$field)) {
                continue;
            }

            if ($this->$field instanceof Collection && $this->$field->isEmpty()) {
                continue;
            }

            if ($strict && $this->$field === null) {
                continue;
            }

            $collection->append($entity);
        }

        return $collection;
    }

    /**
     * Returns new Collection object with all entities in which 'field' property is empty
     *
     * @param string $field
     * @param bool   $strict
     *
     * @return Collection
     */
    public function filterOutNotEmpty($field, $strict =  true)
    {
        $class = get_called_class();
        $collection = new $class;

        foreach ($this as $entity) {

            if (isset($entity->$field)) {
                continue;
            }

            if ($this->$field instanceof Collection && !$this->$field->isEmpty()) {
                continue;
            }

            if ($strict && $this->$field !== null) {
                continue;
            }

            $collection->append($entity);
        }

        return $collection;
    }

    public function filterByRegEx($field, $regex)
    {
        $class = get_called_class();
        $collection = new $class;
        foreach ($this as $key => $entity) {
            if (preg_match($regex, $entity->$field)) {
                $collection[$key] = $entity;
            }
        }
        return $collection;
    }

    public function bindCollection(Collection $collection, $targetKey, $propertyName)
    {
        $reflection = new \ReflectionClass($collection);
        foreach ($this as $entity) {
            if (!isset($entity->$propertyName)) {
                $entity->$propertyName = new $reflection->name;
            }

            if ($entity->$targetKey !== null && isset($collection[$entity->$targetKey])) {
                $entity->$propertyName->appendArray($collection[$entity->$targetKey]);
            }
        }
        return $this;
    }

    public function getKeys()
    {
        $keys = array();
        foreach ($this as $key => $entity) {
            $keys[] = $key;
        }

        return $keys;
    }

    public function chunk($size)
    {
        $class = get_called_class();
        $collection = new $class;

        foreach (array_chunk($this->getKeys(), $size) as $chunkIndex => $keys) {
            $collection[$chunkIndex] = new $class;

            foreach ($keys as $key) {
                $collection[$chunkIndex]->append($this[$key]);
            }
        }

        return $collection;
    }

    public function shift()
    {
        $slice = $this->slice(0, 1);
        $offset = $slice->getKeys();
        $this->offsetUnset($offset[0]);
        return $slice->first();
    }

    public function unshift($element)
    {
        if ($element instanceof Collection) {
            $element = $element->first();
        }

        $class = get_called_class();
        $collection = new $class;

        $collection[] = $element;

        foreach ($this as $entity) {
            $collection[] = $entity;
        }

        return $collection;
    }

    public function slice($offset, $length = null)
    {
        $keys = $this->getKeys();

        $keys = array_slice($keys, $offset, $length);

        $class = get_called_class();
        $collection = new $class;

        foreach ($this as $key => $entity) {
            if (in_array($key, $keys)) {
                $collection[$key] = $entity;
            }
        }

        return $collection;
    }

    public function split($parts)
    {
        $elementsPerChunk = ceil($this->count() / $parts);

        return $this->chunk($elementsPerChunk);
    }

    public function clear()
    {
        $keys = $this->getKeys();

        foreach ($keys as $key) {
            $this->offsetUnset($key);
        }

        return $this;
    }

    public function toArray()
    {
        $result = array();

        foreach ($this as $entity) {
            $result[] = $entity->toArray();
        }

        return $result;
    }

    /**
     * Renumber collection keys (from zero to n), keeping values in the same place
     * @return Collection
     */
    public function reindex()
    {
        $data = $this->getArrayCopy();
        $this->clear();

        $index = 0;
        foreach ($data as $value) {
            $this[$index++] = $value;
        }
        $this->rewind();

        return $this;
    }

    public function distinctOn($property)
    {
        $uniques = array();
        $collection = new self;

        foreach ($this as $key => $entity) {
            if (!in_array($entity->$property, $uniques)) {
                $collection[$key] = $entity;
                $uniques[] = $entity->$property;
            }
        }

        return $collection;
    }

    public function reverse()
    {
        $positions = array_flip($this->getKeys());
        $this->uksort(
            function ($a, $b) use ($positions) {
                return ($positions[$a] < $positions[$b] ? 1 : -1);
            }
        );

        return $this;
    }

    public function map(Closure $callback)
    {
        $class = get_called_class();
        $collection = new $class;

        foreach ($this as $key => $entity) {
            $collection[$key] = $callback($entity);
        }

        return $collection;
    }

    public function walk(Closure $callback)
    {
        foreach ($this as $key => &$entity) {
            $entity = $callback($entity);
        }

        return $this;
    }

    public function search($field, $value, $strict = false)
    {
        if ($strict) {
            foreach ($this as $key => $entity) {
                if ($entity->{$field} === $value) {
                    return $key;
                }
            }
        } else {
            foreach ($this as $key => $entity) {
                if ($entity->{$field} == $value) {
                    return $key;
                }
            }
        }

        return false;
    }

    /**
     * Similar to array_diff function. Returns all entities from current collection
     * that are not exists in second collection based on specific field
     */
    public function diff(\Collection $against, $field)
    {
        $collection = new self;
        foreach ($this as $entity) {
            if (!$against->has($field, $entity->$field)) {
                $collection->append($entity);
            }
        }

        return $collection;
    }

    public function getNewCollection()
    {
        $class = get_called_class();
        return new $class;
    }
}
