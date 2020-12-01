<?php

use Code\Queue;

class QueueTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Producer
     * @return Queue
     */
    public function testEmptyQueueByDefault()
    {
        $queue = new Queue();

        $this->assertEquals(0, $queue->getCount());
        return $queue;
    }

    /**
     * Consumer and also Producer
     * @depends testEmptyQueueByDefault
     * @param Queue $queue
     * @return Queue
     */
    public function testPushAnItemInTheQueue(Queue $queue)
    {
        $queue->push('Sagor');

        $this->assertEquals(1, $queue->getCount());
        return $queue;
    }

    /**
     * Consumer
     * @depends testPushAnItemInTheQueue
     * @param Queue $queue
     */
    public function testRemoveLastItemInTheQueue(Queue $queue)
    {
        $lastValue = $queue->remove();

        $this->assertEquals('Sagor', $lastValue);
    }

    /**
     * Consumer
     * @depends testEmptyQueueByDefault
     * @param Queue $queue
     */
    public function testRemoveAnItemFromTheQueue(Queue $queue)
    {
        $queue->push('Jon');
        $queue->push('Rony');
        $queue->push('Bob');


        $existsItems = $queue->remove('Rony');

        $this->assertNotContains('Rony', $existsItems);
    }
}