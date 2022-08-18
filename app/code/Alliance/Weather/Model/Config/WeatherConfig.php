<?php

namespace Alliance\Weather\Model\Config;

class WeatherConfig
{
    /** @var string */
    public const CITY = 'city';
    
    /** @var string */
    public const COUNTRY = 'country';
   
    /** @var string */
    public const TEMPERATURE = 'temperature';
    
    /** @var string  */
    public const FEELS_LIKE = 'feels_like';
    
    /** @var string  */
    public const PRESSURE = 'pressure';
    
    /** @var string */
    public const HUMIDITY = 'humidity';
    
    /** @var string */
    public const WIND_SPEED = 'wind_speed';
    
    /** @var string  */
    public const SUNRISE = 'sunrise';
    
    /** @var string */
    public const SUNSET = 'sunset';

    /**
     * @return string
     */
    public function getApiKey() : string
    {
        return 'd1d2257a3967884d13ed66d986d80077';
    }

    /**
     * @return string
     */
    public function getApiEndpoint() : string
    {
        return 'https://api.openweathermap.org/data/2.5';
    }
}
