<?php

namespace Alliance\Weather\Ui\DataProvider\WeatherData\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Alliance\Weather\Model\Config\WeatherConfig;


class Collection extends SearchResult
{
    protected function _initSelect()
    {
        $this->addFilterToMap(WeatherConfig::ID, 'main_table.' . WeatherConfig::ID);
        $this->addFilterToMap(WeatherConfig::CITY, 'main_table.' . WeatherConfig::CITY);
        $this->addFilterToMap(WeatherConfig::COUNTRY, 'main_table.' . WeatherConfig::COUNTRY);
        $this->addFilterToMap(WeatherConfig::TEMPERATURE, 'main_table.' . WeatherConfig::TEMPERATURE);
        $this->addFilterToMap(WeatherConfig::FEELS_LIKE, 'main_table.' . WeatherConfig::FEELS_LIKE);
        $this->addFilterToMap(WeatherConfig::PRESSURE, 'main_table.' . WeatherConfig::PRESSURE);
        $this->addFilterToMap(WeatherConfig::HUMIDITY, 'main_table.' . WeatherConfig::HUMIDITY);
        $this->addFilterToMap(WeatherConfig::WIND_SPEED, 'main_table.' . WeatherConfig::WIND_SPEED);
        $this->addFilterToMap(WeatherConfig::SUNRISE, 'main_table.' . WeatherConfig::SUNRISE);
        $this->addFilterToMap(WeatherConfig::SUNSET, 'main_table.' . WeatherConfig::SUNSET);
        parent::_initSelect();
    }
}
