<?php

use Code\Contracts\PaymentContract;
use Code\Exceptions\InvalidAmountException;
use Code\Order;
use Code\Payment;

class OrderTest extends \PHPUnit\Framework\TestCase
{
    public function testASimplePaymentOfOrderClass()
    {
        $mock_payment = $this->createMock(Payment::class);

        $mock_payment->expects($this->once())
            ->method('pay')
            ->willReturn(true);

        $order = new Order($mock_payment);

        $this->assertTrue($order->checkout());
    }

    public function testPaymentAmountNotEmpty()
    {
        $mock_payment = $this->getMockBuilder(Payment::class)
                            ->setMethods(null)
                            ->getMock();

        $order = new Order($mock_payment);

        $this->expectException(InvalidAmountException::class);

        $order->checkout();
    }

    public function testAmountAndDetails()
    {
        $mock_payment = $this->createMock(PaymentContract::class);

        $order = new Order($mock_payment);

        $order->setAmount(100);
        $order->setDetails([]);

        $this->assertEquals(100, $order->getAmount());
        $this->assertEquals([], $order->getDetails());
    }
}