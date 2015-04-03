<?php
namespace Clean\Data;

abstract class Entity
{
    final public function __construct(array $data = [])
    {
        foreach ($data as $key => $item) {
            $this->$key = $item;
        }
    }

    public function toArray()
    {
        return (array)$this;
    }
}
