<?php namespace Test\Clean\Data\Collection\FetchingElementByPosition;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collection;

    private $e1;
    private $e2;
    private $e3;

    public function setup()
    {
        $this->collection = new Collection([
            $this->e1 = new Entity(['id' => 1]),
            $this->e2 = new Entity(['id' => 2]),
            $this->e3 = new Entity(['id' => 3]),
        ]);
    }

    public function testFetchingFirstElementOfCollection()
    {
        $this->assertEquals($this->e1, $this->collection->first());
        $this->assertEquals($this->e1, $this->collection->first());

        $this->collection->shift();
        $this->assertEquals($this->e2, $this->collection->first());
    }

    public function testFetchingLastElementOfCollection()
    {
        $this->assertEquals($this->e3, $this->collection->last());
        $this->assertEquals($this->e3, $this->collection->last());
    }
}
