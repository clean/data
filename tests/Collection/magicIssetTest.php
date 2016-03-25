<?php namespace Test\Clean\Data\Collection\MagicIsset;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestEntity extends Entity
{
    public $fooProperty = 'foo';
}

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testMagicIsset()
    {
        $collection = new Collection([new TestEntity]);
        $this->assertTrue(isset($collection->fooProperty));
        $this->assertFalse(isset($collection->barProperty));
    }

    /**
     * @expectedException \LogicException
     */
    public function testMagicIssetExceptionWhenToManyElements()
    {
        $collection = new Collection([new Entity, new Entity]);
        isset($collection->foo);
    }

    public function testMagicIssetWhenEmptyCollection()
    {
        $collection = new Collection();
        $this->assertEquals(false, isset($collection->foo));
    }
}
