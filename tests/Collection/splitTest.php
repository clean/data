<?php namespace Test\Clean\Data\Collection\Split;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testSplit()
    {
        $collection = new Collection([
            $e1 = new Entity(['id'=>1]),
            $e2 = new Entity(['id'=>2]),
            $e3 = new Entity(['id'=>3]),
            $e4 = new Entity(['id'=>4]),
            $e5 = new Entity(['id'=>5]),
        ]);
        $splitted = $collection->split(2);

        $this->assertEquals([$e1,$e2,$e3], [$splitted[0][0], $splitted[0][1], $splitted[0][2]]);
        $this->assertEquals([$e4,$e5], [$splitted[1][0], $splitted[1][1]]);
    }
}
