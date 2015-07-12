<?php namespace Test\Clean\Data\Collection\GetKeys;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testGettingKeys()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
        ]);

        $this->assertEquals(
            [0,1],
            $collection->getKeys()
        );

        $collection['name'] = new Entity(['id' => 3]);

        $this->assertEquals(
            [0,1, 'name'],
            $collection->getKeys()
        );

        $this->assertEquals(
            [0,1,2],
            $collection->reindex()->getKeys()
        );
    }
}
