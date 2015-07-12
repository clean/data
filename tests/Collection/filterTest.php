<?php namespace Test\Clean\Data\Collection\Filter;

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

        $collection->filter(function ($entity) {
            if ($entity->id == 2) {
                return false;
            }
            return true;
        });

        $this->assertEquals(
            [
                ['id' => 1],
                ['id' => 3],
            ],
            $collection->toArray()
        );
    }
}
