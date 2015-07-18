<?php namespace Test\Clean\Data\Collection\ToArray;

use Clean\Data\Entity;
use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testCastingCollectionToArray()
    {
        $entity1 = new Entity(['one' => 1]);
        $entity2 = new Entity(['two' => 2]);
        $entity3 = new Entity(['three' => 3]);

        $collection = new Collection([$entity1, $entity2, $entity3]);

        $this->assertEquals(
            [
                ['one' => 1],
                ['two' => 2],
                ['three' => 3],
            ],
            $collection->toArray()
        );
    }
}
