<?php namespace Test\Clean\Data\Collection\FetchingElementByPosition;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collection;

    public function setup()
    {
        $data = [
            'val1' => 1,
            'val2' => 'two',
            'val3' => [1,2],
        ];

        $this->collection = new Collection($data);

    }

    public function testFetchingFirstElementOfCollection()
    {
        $this->assertEquals(1, $this->collection->first());
        $this->assertEquals(1, $this->collection->first());

        $this->collection->shift();
        $this->assertEquals('two', $this->collection->first());
    }

    public function testFetchingLastElementOfCollection()
    {
        $this->assertEquals([1,2], $this->collection->last());
        $this->assertEquals([1,2], $this->collection->last());
    }
}
