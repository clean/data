<?php namespace Test\Clean\Data\Collection\DistinctOn;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 1]),
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
            new Entity(['id' => 3]),
        ]);

        $collection->distinctOn('id');

        $this->assertEquals(
            [
                ['id' => 1],
                ['id' => 2],
                ['id' => 3],
            ],
            $collection->toArray()
        );
    }
}
