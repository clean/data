<?php namespace Clean\Data;

class Entity
{
    final public function __construct(array $data = [ ])
    {
        foreach ($data as $key => $item) {
            $this->$key = $item;
        }
    }
}
