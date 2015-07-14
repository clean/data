<?php namespace Clean\Data;

use Closure;
use InvalidArgumentException;

class Collection extends \ArrayIterator
{
    public function __construct($data = null)
    {
        parent::__construct([]);
        if ($data) {
            $this->append($data);
        }
    }

    /**
     * Returns new instance of collection of the same type
     *
     * @return Collection
     */
    public function getNewCollection()
    {
        $class = get_called_class();
        return new $class;
    }

    /**
     * Append entities to collection
     *
     * @param Traversable $data
     * @access public
     *
     * @return Collection
     */
    public function append($data)
    {
        if (is_array($data) || $data instanceof \Traversable) {
            foreach ($data as $value) {
                parent::append($value);
            }
        } else {
            parent::append($data);
        }
        return $this;
    }

    /**
     * Prepand entity to the begining of collection
     *
     * @param Entity $entity
     *
     * @return Collection
     */
    public function prepend($entity)
    {
        $collection = $this->getNewCollection();
        $collection->append($entity);
        foreach ($this as $entity) {
            $collection->append($entity);
        }
        $this->clear();
        $this->append($collection);
        return $this;
    }

    public function __call($name, $args)
    {
        if ($this->count() > 1) {
            throw new \LogicException(
                'Collection has more then one element, you cannot call entity method directly'
            );
        }
        $current = $this->first();

        if (!$current) {
            throw new \LogicException('Cannot operate on empty collection');
        }

        if (!method_exists($current, $name)) {
            throw new \RuntimeException(sprintf("Class %s does not have a method '%s'", get_class($current), $name));
        }

        return call_user_func_array([$current, $name], $args);
    }

    /**
     * Returns direct value from entity when collection has only one element
     *
     * @param string $name property name
     *
     * @throws \LogicException when collection has more then one element
     *
     * @return mixed
     */
    public function __get($name)
    {
        if ($this->count() > 1) {
            throw new \LogicException(
                'Collection has more then one element, you cannot get entity property directly'
            );
        }
        $current = $this->first();
        if (!$current) {
            return null;
        }
        return $current->$name;
    }

    /**
     * Returns first entity from collection
     *
     * @return Entity
     */
    public function first()
    {
        $this->rewind();
        return $this->current();
    }

    /**
     * Returns last entity from collection
     *
     * @return Entity
     */
    public function last()
    {
        $this->seek($this->count() - 1);
        $entity = $this->current();
        $this->rewind();
        return $entity;
    }

    /**
     * Returns next entity from collection
     *
     * @return Entity
     */
    public function getNext()
    {
        if (!is_int($this->key())) {
            throw new \LogicException("Can't get next element from not numeric ordered collection");
        }
        if ($this->offsetExists($this->key() + 1)) {
            return $this->offsetGet($this->key() + 1);
        }
    }

    /**
     * Returns previous entity from collection
     *
     * @return Entity
     */
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
     * returns random entity from collection
     *
     * @return Entity
     */
    public function getRandom()
    {
        $randomKey = array_rand($this->getArrayCopy());
        return $this[$randomKey];
    }

    /**
     * Returns true if collection is not empty
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return !$this->isEmpty();
    }

    /**
     * Returns true if collection is empty
     *
     * @return bool
     */
    public function isEmpty()
    {
        return (0 === $this->count());
    }


    /**
     * Checks if collection has entity with field equals to given value
     *
     * @param string $field field
     * @param mixed $value value
     *
     * @return bool
     */
    public function has($field, $value, $strict = false)
    {
        return !(false === $this->search($field, $value, $strict));
    }

    /**
     * Search for an element with given property and value
     *
     * @param string $field name of property
     * @param mixed $value value to compare
     * @param bool $strict compare value and type of property
     *
     * @return void
     */
    public function search($field, $value, $strict = false)
    {
        $value = is_array($value) ? $value : array($value);
        foreach ($this as $key => $entity) {
            if (isset($entity->$field) && in_array($entity->$field, $value, $strict)) {
                return $key;
            }
        }

        return false;
    }

    /**
     * Shift an entity off the begining of collection
     *
     * @return Entity
     */
    public function shift()
    {
        $slice = $this->slice(0, 1);
        $offset = $slice->getKeys();
        $this->offsetUnset($offset[0]);
        return $slice->first();
    }

    /**
     * Filter collection from entities not matching criteria given in callback
     *
     * @param \Closure $callback callback
     *
     * @return Collection
     */
    public function filter(\Closure $callback)
    {
        $offsetToRemove = [];
        foreach ($this as $offset => $entity) {
            if (!$callback($entity)) {
                $offsetToRemove[] = $offset;
            }
        }

        foreach ($offsetToRemove as $offset) {
            $this->offsetUnset($offset);
        }

        return $this;
    }


    /**
     * Returns collection keys
     *
     * @return array
     */
    public function getKeys()
    {
        $keys = array();
        foreach ($this as $key => $entity) {
            $keys[] = $key;
        }

        return $keys;
    }

    /**
     * Splits collection into chunks
     *
     * @param integer $size
     */
    public function chunk($size)
    {
        $collection = $this->getNewCollection();

        foreach (array_chunk($this->getKeys(), $size) as $chunkIndex => $keys) {
            $collection[$chunkIndex] = $this->getNewCollection();

            foreach ($keys as $key) {
                $collection[$chunkIndex]->append($this[$key]);
            }
        }

        return $collection;
    }


    /**
     * Extract a slice of the collection
     *
     * @param integer $offset
     * @param integer|null $length
     */
    public function slice($offset, $length = null)
    {
        $keys = $this->getKeys();

        $keys = array_slice($keys, $offset, $length);

        $collection = $this->getNewCollection();

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

    /**
     * Remove all entities form collection
     *
     * @return Collection
     */
    public function clear()
    {
        $keys = $this->getKeys();

        foreach ($keys as $key) {
            $this->offsetUnset($key);
        }
        return $this;
    }

    /**
     * Tranform collection to array
     *
     * @return array
     */
    public function toArray()
    {
        $result = [];

        foreach ($this as $entity) {
            if ($entity instanceof Entity) {
                $result[] = (array)$entity;
            } elseif (is_scalar($entity)) {
                $result[] = $entity;
            } elseif ($entity instanceof Collection) {
                $result[] = $entity->toArray();
            }
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

    /**
     * Eliminates entities that contains the same value in given property
     *
     * @param string $propertyName Name of the property
     *
     * @return Collection
     */
    public function distinctOn($propertyName)
    {
        $values = [];
        $keys = [];
        foreach ($this as $key => $entity) {
            if (in_array($entity->$propertyName, $values)) {
                $keys[] = $key;
            } else {
                $values[] = $entity->$propertyName;
            }
        }

        foreach ($keys as $key) {
            $this->offsetUnset($key);
        }

        return $this;
    }

    /**
     * Return an collection with elements in reverse order
     *
     * @return Collection
     */
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

    /**
     * Apply a user supplied function to every member of an Collection
     *
     * @param Closure $callback user supplied function
     *
     * @return Collection
     */
    public function walk(Closure $callback)
    {
        foreach ($this as &$entity) {
            $callback($entity);
        }

        return $this;
    }

    /**
     * Return values from all entities from given property
     *
     * @param string $name name
     *
     * @return array
     */
    public function getAllValuesForProperty($name)
    {
        $values = [];
        foreach ($this as $entity) {
            if (!isset($entity->$name)) {
                continue;
            }

            $value = $entity->$name;
            if ($value instanceof Collection && $value->isEmpty()) {
                continue;
            }

            if (null === $value) {
                continue;
            }

            if (is_scalar($value)) {
                $values[$value] = $value;
            } else {
                $values[] = $value;
            }
        }

        return array_values($values);
    }

    public function groupByField($name, $callback = null)
    {
        $collection = $this->getNewCollection();
        foreach ($this as $entity) {
            if (!isset($entity->$name) || $entity->$name === null) {
                continue; //when entity dosen't have set property it will be omitted
            }

            $value = $entity->$name;
            if (is_callable($callback)) {
                $value = $callback($value);
            }

            if (!isset($collection[$value])) {
                $collection[$value] = $this->getNewCollection();
            }
            $collection[$value]->append($entity);
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
                $entity->$propertyName->append($collection[$entity->$targetKey]);
            }
        }
        return $this;
    }
}
