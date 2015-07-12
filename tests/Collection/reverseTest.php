<?php namespace Test\Clean\Data\Collection\Reverse;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function test()
    {

        $collection = new Collection([
            $e1 = new Entity(['id' => 1]),
            $e2 = new Entity(['id' => 2]),
            $e3 = new Entity(['id' => 3]),
        ]);

        $collection->reverse();
        $this->assertEquals(
            [
                ['id' => 3],
                ['id' => 2],
                ['id' => 1],
            ],
            $collection->toArray()
        );
    }
}
