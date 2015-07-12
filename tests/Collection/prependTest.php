<?php namespace Test\Clean\Data\Collection\Prepend;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $e1 = new Entity(['id' => 1]);

        $collection = new Collection([
            $e2 = new Entity(['id' => 2]),
            $e3 = new Entity(['id' => 3]),
        ]);

        $collection->prepend($e1);
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
