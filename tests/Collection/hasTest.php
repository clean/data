<?php namespace Test\Clean\Data\Collection\Has;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testHas()
    {
        $entity1 = new Entity(['id'=>1]);
        $entity2 = new Entity(['id'=>2]);
        $entity3 = new Entity(['id'=>3]);
        
        $collection = new Collection([$entity1, $entity2, $entity3]);

        $this->assertTrue($collection->has('id', 1));
        $this->assertTrue($collection->has('id', 1));
        $this->assertTrue($collection->has('id', [1,5]));
        $this->assertTrue($collection->has('id', 2));
        $this->assertTrue($collection->has('id', 3));
        $this->assertFalse($collection->has('id', [4,5]));
        $this->assertFalse($collection->has('id', 4));
        $this->assertFalse($collection->has('noid', 1));
        $this->assertFalse($collection->has('id', '1', true));
    }
}
