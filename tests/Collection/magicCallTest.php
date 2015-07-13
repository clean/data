<?php namespace Test\Clean\Data\Collection\MagicCall;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testGettingPropertyFromColletionWithOneElement()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
        ]);

        $this->assertEquals(1, $collection->id);
    }

    /**
     * @expectedException LogicException
     */
    public function testGettingPropertyFromColletionWithMoreThenOneElement()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
        ]);

        $collection->id;
    }

    /**
     * @expectedException RuntimeException
     */
    public function testCallingInvalidMethodFromSingleElementCollection()
    {
        $collection = new Collection([
            new Entity(['id' => 1]),
        ]);

        $collection->invalidMethod();
    }

    /**
     * @expectedException LogicException
     */
    public function testCallingInvalidMethodFromEmptyCollection()
    {
        $collection = new Collection();
        $collection->invalidMethod();
    }
}
