<?php namespace Test\Clean\Data\Entity\ToArray;

use Clean\Data\Entity;

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function testCastingEntityToArray()
    {
        $data = [
            'val1' => 1,
            'val2' => 'two',
            'val3' => [1,2],
        ];

        $entity = new Entity($data);

        $this->assertEquals($data, (array)$entity);
    }
}
