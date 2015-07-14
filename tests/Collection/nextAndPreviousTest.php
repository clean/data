<?php namespace Test\Clean\Data\Collection\NextAndPrevious;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collectionNumeric;
    private $collectionNonNumeric;

    public function setup()
    {
        $this->collectionNumeric = new Collection([1,2,3]);

        $this->collectionNonNumeric = new Collection();
        $this->collectionNonNumeric[0] = 0;
        $this->collectionNonNumeric['a'] = 'a';
        $this->collectionNonNumeric[1] = 1;
    }

    public function testIfNextIsNotChangingInternalPointerOfCurrentOffsetIndex()
    {
        $collection = $this->collectionNumeric;
        $this->assertEquals(2, $collection->getNext());
        $this->assertEquals(2, $collection->getNext());
    }

    /**
     * @expectedException \LogicException
     */
    public function testIfNextIsNotPossibleOnNonNumericKeys()
    {
        $this->collectionNonNumeric->getNext();
    }

    /**
     * @expectedException \LogicException
     */
    public function testIfPreviousIsNotPossibleOnNonNumericKeys()
    {
        $this->collectionNonNumeric->getPrevious();
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testPreviousWhenIndexIsOnBegining()
    {
        $this->assertEquals(null, $this->collectionNumeric->getPrevious());
    }

    public function testPrevious()
    {
        $this->collectionNumeric->seek(1);
        $this->assertEquals(1, $this->collectionNumeric->getPrevious());

        $this->collectionNumeric->seek(2);
        $this->assertEquals(2, $this->collectionNumeric->getPrevious());
    }
}
