<?php namespace Test\Clean\Data\Collection\GetRandom;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testGetRandom()
    {
        $collection = new Collection([
            new Entity(['id'=>1]),
            new Entity(['id'=>2]),
            new Entity(['id'=>3]),
            new Entity(['id'=>4]),
            new Entity(['id'=>5]),
            new Entity(['id'=>6]),
            new Entity(['id'=>7]),
            new Entity(['id'=>8]),
            new Entity(['id'=>9]),
            new Entity(['id'=>10]),
            new Entity(['id'=>11]),
            new Entity(['id'=>12]),
            new Entity(['id'=>13]),
            new Entity(['id'=>14]),
            new Entity(['id'=>15]),
            new Entity(['id'=>16]),
            new Entity(['id'=>17]),
        ]);

        $value1 = $collection->getRandom();
        $value2 = $collection->getRandom();

        $this->assertNotEquals($value1, $value2);
    }
}
