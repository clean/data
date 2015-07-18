<?php namespace Test\Clean\Data\Collection\Clear;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testClear()
    {
        $e1 = new Entity(['id'=>1]);
        $e2 = new Entity(['id'=>2]);
        $e3 = new Entity(['id'=>3]);
        $e4 = new Entity(['id'=>4]);
        
        $collection = new Collection([$e1,$e2,$e3]);
        $collection['one'] = $e4;

        $collection->clear();

        $this->assertTrue($collection->isEmpty());
    }
}
