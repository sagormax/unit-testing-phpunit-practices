<?php

namespace Code;


use Code\Contracts\PaymentContract;

class Order
{
    /**
     * @var $details
     */
    protected $details;

    /**
     * @var $amount
     */
    protected $amount;

    /**
     * @var $payment
     */
    protected $payment;

    /**
     * @var PaymentContract
     */
    private $paymentContract;

    /**
     * Order constructor.
     *
     * @param PaymentContract $paymentContract
     */
    public function __construct(PaymentContract $paymentContract)
    {
        $this->paymentContract = $paymentContract;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed $details
     */
    public function setDetails($details): void
    {
        $this->details = $details;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Checkout
     *
     * @return mixed
     */
    public function checkout()
    {
        return $this->paymentContract->pay($this->amount, $this->details);
    }
}