<?php namespace Test\Clean\Data\Collection\First;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testFetchingFirstElementOfCollection()
    {
        $data = [
            'val1' => 1,
            'val2' => 'two',
            'val3' => [1,2],
        ];

        $collection = new Collection($data);

        $this->assertEquals(1, $collection->first());
        $this->assertEquals(1, $collection->first());
    }
}
