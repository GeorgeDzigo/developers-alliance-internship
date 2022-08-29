<?php

namespace Alliance\Weather\Block;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Alliance\Weather\Model\Config\WeatherConfig;
use Alliance\Weather\Model\ResourceModel\Weather\CollectionFactory;
use Alliance\Weather\Model\ResourceModel\Weather as ResourceModel;

class Weather extends Template
{
    /** @var string */
    const POST_URL = 'weather/index/save';

    /** @var UrlInterface */
    private UrlInterface $urlBuilder;

    /** @var DataPersistorInterface */
    private DataPersistorInterface $dataPersistor;

    /** @var CollectionFactory */
    private CollectionFactory $collectionFactory;


    private ResourceModel $weatherResource;

    public function __construct(
        Template\Context       $context,
        array                  $data = [],
        UrlInterface           $urlBuilder,
        DataPersistorInterface $dataPersistor,
        CollectionFactory      $collectionFactory,
        ResourceModel          $weatherResource
    )
    {
        $this->dataPersistor     = $dataPersistor;
        $this->urlBuilder        = $urlBuilder;
        $this->collectionFactory = $collectionFactory;
        $this->weatherResource   = $weatherResource;
        parent::__construct($context, $data);
    }

    /**
     * @return \Alliance\Weather\Model\Weather
     */
    public function getDataForPDF() {
        return $this->collectionFactory->create();
    }

    /**
     * @return mixed
     */
    public function getTableTitlesForPDF()
    {
        return $this->weatherResource->getTableFields();
    }

    /**
     * @return string
     */
    public function getPostUrl() {
        return $this->urlBuilder->getUrl(self::POST_URL);
    }

    /**
     * @param $key
     * @return mixed|string
     */
    private function getDataPersistorItem($key)
    {
        $res = $this->dataPersistor->get($key);

        if($res) {
            $this->dataPersistor->clear($key);

            return $res;
        }

        return "";
    }


    /**
     * @return mixed|string
     */
    public function getCity()
    {
        return $this->getDataPersistorItem(WeatherConfig::CITY);
    }

    /**
     * @return mixed|string
     */
    public function getCountry()
    {
        return $this->getDataPersistorItem(WeatherConfig::COUNTRY);
    }

    /**
     * @return mixed|string
     */
    public function getTemperature()
    {
        return $this->getDataPersistorItem(WeatherConfig::TEMPERATURE);
    }

    /**
     * @return mixed|string
     */
    public function getFeelsLike()
    {
        return $this->getDataPersistorItem(WeatherConfig::PRESSURE);
    }

    /**
     * @return mixed|string
     */
    public function getPressure()
    {
        return $this->getDataPersistorItem(WeatherConfig::PRESSURE);
    }

    /**
     * @return mixed|string
     */
    public function getHumidity()
    {
        return $this->getDataPersistorItem(WeatherConfig::HUMIDITY);
    }

    /**
     * @return mixed|string
     */
    public function getWindSpeed()
    {
        return $this->getDataPersistorItem(WeatherConfig::WIND_SPEED);
    }

    /**
     * @return mixed|string
     */
    public function getSunrise()
    {
        return $this->getDataPersistorItem(WeatherConfig::SUNRISE);
    }

    /**
     * @return void
     */
    public function getSunset()
    {
        return $this->getDataPersistorItem(WeatherConfig::SUNSET);
    }
}
