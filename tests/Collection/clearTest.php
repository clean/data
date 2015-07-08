<?php namespace Test\Clean\Data\Collection\Clear;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testClear()
    {
        $collection = new Collection([1,2,3]);
        $collection['one'] = 1;

        $collection->clear();

        $this->assertTrue($collection->isEmpty());
    }
}
