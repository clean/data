<?php namespace Test\Clean\Data\Collection\Append;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testAppendingSingleElement()
    {
        $collection = new Collection([new Entity(['id'=>1])]);
        $this->assertEquals(1, $collection->count());
        $collection->append(new Entity(['id'=>2]));
        $this->assertEquals(2, $collection->count());

        $this->assertEquals(
            [
                ['id' => 1],
                ['id' => 2],
            ],
            $collection->toArray()
        );
    }

    public function testAppendingMultipleElement()
    {
        $data = [
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
        ];
        $collection = new Collection($data);
        $this->assertEquals(2, $collection->count());

        $this->assertEquals(
            [
                ['id' => 1],
                ['id' => 2],
            ],
            $collection->toArray()
        );
    }
}
