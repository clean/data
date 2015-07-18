<?php namespace Test\Clean\Data\Collection\GetNewCollection;

use Clean\Data\Collection;

class TestCollection extends Collection
{
}

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collection;

    public function testGettingNewCollection()
    {
        $collection = new TestCollection();
        $this->assertInstanceOf(TestCollection::class, $collection->getNewCollection());

        $collection = new Collection();
        $this->assertInstanceOf(Collection::class, $collection->getNewCollection());
    }
}
