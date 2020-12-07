<?php

use Code\Temperature;
use Code\Weather;
use PHPUnit\Framework\TestCase;

class TemperatureTest extends TestCase
{
    public function testGetTemperature()
    {
        $mockTemperature = $this->createMock(Temperature::class);

        $mockMap = [
            ["12:00", 20],
            ["15:00", 20]
        ];

        $mockTemperature->expects($this->exactly(2))
            ->method('getTemperature')
            ->willReturn($this->returnValueMap($mockMap));

        $weather = new Weather($mockTemperature);

        $this->assertEquals(20, $weather->getAverageWeather("12:00", "15:00"));
    }
}