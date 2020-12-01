<?php

use Code\Queue;
use Code\QueueOverloadException;

class QueueFixtureTest extends \PHPUnit\Framework\TestCase
{
    protected static $queue;

    protected function setUp(): void
    {
        self::$queue->resetQueue();
    }

    public static function setUpBeforeClass(): void
    {
        self::$queue = new Queue();
    }

    public static function tearDownAfterClass(): void
    {
        self::$queue = null;
    }

    public function testEmptyQueueByDefault()
    {
        $this->assertEquals(0, self::$queue->getCount());
    }

    public function testRemoveLastItemInTheQueue()
    {
        self::$queue->push('Sagor');
        $lastValue = self::$queue->remove();

        $this->assertEquals('Sagor', $lastValue);
    }

    public function testRemoveAnItemFromTheQueue()
    {
        self::$queue->push('Jon');
        self::$queue->push('Rony');
        self::$queue->push('Bob');


        $existsItems = self::$queue->remove('Rony');

        $this->assertNotContains('Rony', $existsItems);
    }

    public function testPushAnItemInTheQueue()
    {
        self::$queue->push('Sagor');

        $this->assertEquals(1, self::$queue->getCount());
    }

    public function testMaxFiveItemCanBePushedInTheQueue()
    {
        self::$queue->push('Sagor');
        self::$queue->push('Pagor');
        self::$queue->push('Jagor');
        self::$queue->push('Gagor');
        self::$queue->push('Lagor');

        $this->expectException(QueueOverloadException::class);

        self::$queue->push('Kagor');
    }
}