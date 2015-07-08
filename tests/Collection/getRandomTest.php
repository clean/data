<?php namespace Test\Clean\Data\Collection\GetRandom;

use Clean\Data\Collection;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testGetRandom()
    {
        $max = 200000;
        $collection = new Collection(range(1, $max));

        $value1 = $collection->getRandom();
        $value2 = $collection->getRandom();

        $this->assertGreaterThanOrEqual(1, $value1);
        $this->assertLessThanOrEqual($max, $value1);
        $this->assertNotEquals($value1, $value2);
    }
}
