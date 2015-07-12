<?php namespace Test\Clean\Data\Collection\walk;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
            new Entity(['id' => 3]),
        ]);

        $collection->map(function ($entity) {
            $entity->id *= $entity->id;
        });

        $this->assertEquals(
            [
                ['id' => 1],
                ['id' => 4],
                ['id' => 9],
            ],
            $collection->toArray()
        );
    }
}
