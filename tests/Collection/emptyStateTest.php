<?php namespace Test\Clean\Data\Collection\EmptyState;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collection;

    public function testIsEmpty()
    {
        $collection = new Collection();
        $this->assertTrue($collection->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $e1 = new Entity(['id'=>1]);
        $e2 = new Entity(['id'=>2]);

        $collection = new Collection([$e1, $e2]);
        $this->assertTrue($collection->isNotEmpty());
    }
}
