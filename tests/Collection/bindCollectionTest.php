<?php namespace Test\Clean\Data\Collection\BindCollection;

use Clean\Data\Collection;
use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $one = new Collection([
            new Entity(['id' => 1]),
            new Entity(['id' => 2]),
            new Entity(['id' => 1]),
            new Entity(['id' => null]),
            new Entity(['noid' => 1]),
        ]);
        
        $two = new Collection([
            new Entity(['id2' => 1]),
            new Entity(['id2' => 5]),
            new Entity(['id2' => 1]),
            new Entity(['id2' => null]),
        ]);

        $one->bindCollection($two, ['id2' => 'id'], 'two');

        $this->assertInstanceOf(Collection::class, $one[0]->two);
        $this->assertInstanceOf(Collection::class, $one[1]->two);
        $this->assertInstanceOf(Collection::class, $one[2]->two);

        $this->assertEquals(2, $one[0]->two->count());
        $this->assertEquals(0, $one[1]->two->count());
        $this->assertEquals(2, $one[2]->two->count());
    }
}
