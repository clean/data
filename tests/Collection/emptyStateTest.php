<?php namespace Test\Clean\Data\Collection\EmptyState;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collection;

    public function testIsEmpty()
    {
        $collection = new Collection();
        $this->assertTrue($collection->isEmpty());

        $collection = new Collection([]);
        $this->assertTrue($collection->isEmpty());

        $collection = new Collection(null);
        $this->assertTrue($collection->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $collection = new Collection(['a' => 1, 'b' => 2]);
        $this->assertTrue($collection->isNotEmpty());

        $collection = new Collection([null]);
        $this->assertTrue($collection->isNotEmpty());
    }
}
