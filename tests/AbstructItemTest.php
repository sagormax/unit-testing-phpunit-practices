<?php

use Code\AbstructItem;
use PHPUnit\Framework\TestCase;

class AbstructItemTest extends TestCase
{
    public function testGetName()
    {
        $mock = $this->getMockBuilder(AbstructItem::class)
                    ->setConstructorArgs(['Mr.'])
                    ->getMockForAbstractClass();

        $mock->method('getPrefix')->willReturn('Mr.');

        $mock->setName('Jon Doe');

        $this->assertEquals('Mr. Jon Doe', $mock->getFullName());
    }
}