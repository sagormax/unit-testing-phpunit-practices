<?php

use Code\Queue;

class QueueIndependantTest extends \PHPUnit\Framework\TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function testEmptyQueueByDefault()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testPushAnItemInTheQueue()
    {
        $this->queue->push('Sagor');

        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testRemoveLastItemInTheQueue()
    {
        $this->queue->push('Sagor');
        $lastValue = $this->queue->remove();

        $this->assertEquals('Sagor', $lastValue);
    }

    public function testRemoveAnItemFromTheQueue()
    {
        $this->queue->push('Jon');
        $this->queue->push('Rony');
        $this->queue->push('Bob');


        $existsItems = $this->queue->remove('Rony');

        $this->assertNotContains('Rony', $existsItems);
    }

    protected function tearDown(): void
    {
        unset($this->queue);
    }
}