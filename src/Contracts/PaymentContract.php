<?php

namespace Code\Contracts;


interface PaymentContract
{
    /**
     * @param $amount
     * @param $details
     * @return mixed
     */
    public function pay($amount, $details);
}