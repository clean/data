<?php namespace Clean\Data;

/**
 * Entity object that extends stdClass constructor to allow passing traversable data to pupulate object properties
 */
class Entity
{
    /**
     * __construct
     *
     * @param mixed $data Traversable data (array,stdClass,ArrayIterator)
     *
     * @return self
     */
    final public function __construct($data = [])
    {
        foreach ($data as $key => $item) {
            $this->$key = $item;
        }
    }
}
