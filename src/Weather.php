<?php

namespace Code;


use Code\Contracts\TemperatureContract;

class Weather
{
    /**
     * @var TemperatureContract
     */
    private $temperatureContract;

    /**
     * Weather constructor.
     *
     * @param TemperatureContract $temperatureContract
     */
    public function __construct(TemperatureContract $temperatureContract)
    {
        $this->temperatureContract = $temperatureContract;
    }

    /**
     * Get Average Weather
     *
     * @param string $startTime
     * @param string $endTime
     * @return float|int
     */
    public function getAverageWeather(string $startTime, string $endTime)
    {
        $start = $this->temperatureContract->getTemperature($startTime);
        $end = $this->temperatureContract->getTemperature($endTime);

        return ($start + $end) / 2;
    }
}