<?php

namespace Code\Contracts;


interface TemperatureContract
{
    public function getTemperature(string $time);
}