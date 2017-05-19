<?php namespace Test\Clean\Data\Collection\Extend;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testExtendingCollection()
    {
        $c1 = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
        ]);

        $c2 = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 3]),
            new Entity(['id' => 4]),
        ]);

        $c1->extend($c2);

        $this->assertEquals(5, $c1->count());
        $this->assertEquals(3, $c2->count());
        
    }
}
