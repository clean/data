<?php namespace Test\Clean\Data\Collection\Split;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testSplit()
    {
        $collection = new Collection([1,2,3,4,5]);
        $splitted = $collection->split(2);

        $this->assertEquals([1,2,3], $splitted[0]->toArray());
        $this->assertEquals([4,5], $splitted[1]->toArray());
    }
}
