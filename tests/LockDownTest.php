<?php

use Code\LockDown;
use Code\LockDownChild;

class LockDownTest extends \PHPUnit\Framework\TestCase
{
    public function testLockDownWillNotReturnEmpty()
    {
        $lockDown = new LockDown();

        $this->assertNotEmpty($lockDown->getSessionID());
    }

    public function testGetLockDownID()
    {
        $lockDown = new LockDownChild();

        $this->assertIsString($lockDown->getID());
    }

    public function testGetToken()
    {
        $lockDown = new LockDown();

        $reflection = new ReflectionClass(LockDown::class);
        $method = $reflection->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($lockDown);

        $this->assertIsInt($result);
    }

    public function testClassNameAttribute()
    {
        $lockDown = new LockDown();

        $reflection = new ReflectionClass(LockDown::class);
        $attribute = $reflection->getProperty('name');
        $attribute->setAccessible(true);

        $value = $attribute->getValue($lockDown);

        $this->assertIsInt($value);
    }
}