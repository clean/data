<?php namespace Test\Clean\Data\Collection\AppendArray;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function invalidData()
    {
        return [
            [1],
            [null],
            ['string'],
            [new \stdClass],
        ];
    }
    /**
     * @dataProvider invalidData
     * @expectedException \InvalidArgumentException
     */
    public function testAppendingInvalidDataType($data)
    {
        $collection = new Collection;
        $collection->appendArray($data);
    }
}
