<?php namespace Test\Clean\Data\Collection\GetAllValuesForProperty;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
            new Entity(['id' => 1]),
            new Entity(['id' => null]),
            new Entity(['id' => 3, 'foo' => 1]),
            new Entity(['id' => $c1 = new Collection()]),
            new Entity(['id' => $c2 = new Collection(['id' => new Entity()])]),
        ]);

        $this->assertEquals([1,2,3, $c2], $collection->getAllValuesForProperty('id'));
        $this->assertEquals([1], $collection->getAllValuesForProperty('foo'));
    }
}
