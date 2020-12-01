<?php

namespace Code;


use Code\Contracts\PaymentContract;
use Code\Exceptions\InvalidAmountException;

class Payment implements PaymentContract
{

    /**
     * Pay now
     *
     * @param $amount
     * @param $details
     * @return bool
     * @throws InvalidAmountException
     */
    public function pay($amount, $details)
    {
        if(empty($amount) || $amount < 10) {
            throw new InvalidAmountException();
        }

        // Call payment API
        sleep(3);

        return true;
    }
}