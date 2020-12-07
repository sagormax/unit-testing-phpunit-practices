<?php

namespace mockery;

use Code\Temperature;
use Code\Weather;
use PHPUnit\Framework\TestCase;

class TemperatureTest extends TestCase
{
    public function testGetTemperature()
    {
        $mockTemperature = \Mockery::mock(Temperature::class);

        $mockTemperature->shouldReceive('getTemperature')
            ->once()
            ->with("12:00")
            ->andReturn(20);

        $mockTemperature->shouldReceive('getTemperature')
            ->once()
            ->with("15:00")
            ->andReturn(20);

        $weather = new Weather($mockTemperature);

        $this->assertEquals(20, $weather->getAverageWeather("12:00", "15:00"));
    }

    public function tearDown(): void
    {
        parent::tearDown();
        \Mockery::close();
    }
}