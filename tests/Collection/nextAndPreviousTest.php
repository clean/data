<?php namespace Test\Clean\Data\Collection\NextAndPrevious;

use Clean\Data\Entity;
use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    private $collectionNumeric;
    private $collectionNonNumeric;
    private $e1;
    private $e2;
    private $e3;

    public function setup()
    {
        $this->collectionNumeric = new Collection([
            $this->e1 = new Entity(['id' => 1]),
            $this->e2 = new Entity(['id' => 2]),
            $this->e3 = new Entity(['id' => 3]),
        ]);

        $this->collectionNonNumeric = new Collection();
        $this->collectionNonNumeric[0] = $this->e1;
        $this->collectionNonNumeric['a'] = $this->e2;
        $this->collectionNonNumeric[1] = $this->e3;
    }

    public function testIfNextIsNotChangingInternalPointerOfCurrentOffsetIndex()
    {
        $collection = $this->collectionNumeric;
        $this->assertEquals($this->e2, $collection->getNext());
        $this->assertEquals($this->e2, $collection->getNext());
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
        $this->collectionNonNumeric->seek(1);
        $data = $this->collectionNonNumeric->getPrevious();
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testPreviousWhenIndexIsOnBegining()
    {
        $this->collectionNumeric->getPrevious();
    }

    public function testPrevious()
    {
        $this->collectionNumeric->seek(1);
        $this->assertEquals($this->e1, $this->collectionNumeric->getPrevious());

        $this->collectionNumeric->seek(2);
        $this->assertEquals($this->e2, $this->collectionNumeric->getPrevious());
    }
}
