<?php namespace Test\Clean\Data\Collection\MagicCallAndGet;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestEntity
{
    public $fooProperty = 'foo';

    public function foo()
    {
        return 'foo';
    }
}

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testMagicCallAndGet()
    {
        $collection = new Collection([new TestEntity]);
        $this->assertEquals('foo', $collection->foo());
        $this->assertEquals('foo', $collection->fooProperty);
    }

    /**
     * @expectedException \LogicException
     */
    public function testMagicCallExceptionWhenToManyElements()
    {
        $collection = new Collection([new TestEntity, new TestEntity]);
        $collection->foo();
    }

    /**
     * @expectedException \LogicException
     */
    public function testMagicCallExceptionWhenEmptyCollection()
    {
        $collection = new Collection();
        $collection->foo();
    }

    /**
     * @expectedException \LogicException
     */
    public function testMagicGetExceptionWhenToManyElements()
    {
        $collection = new Collection([new TestEntity, new TestEntity]);
        $collection->fooProperty;
    }

    public function testMagicGetExceptionWhenEmptyCollection()
    {
        $collection = new Collection();
        $this->assertEquals(null, $collection->fooProperty);
    }
}
