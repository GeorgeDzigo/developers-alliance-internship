<?php

namespace Alliance\Weather\Controller\Index;

use Alliance\Weather\Model\Config\WeatherConfig;
use Alliance\Weather\Model\Weather;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\HTTP\Client\Curl;
use Alliance\Weather\Model\ResourceModel\Weather as WeatherResourceModel;


class Save extends Action
{
    /** @var Context */
    private Context $context;

    /** @var WeatherConfig */
    private WeatherConfig $config;

    /** @var Curl */
    private Curl $curl;

    /** @var Weather */
    private Weather $weather;

    /** @var WeatherResourceModel */
    private WeatherResourceModel $resourceWeather;

    /** @var RedirectFactory */
    private RedirectFactory $redirectFactory;
    
    /** @var DataPersistorInterface */
    private DataPersistorInterface $dataPersistor;

    /**
     * @param Context $context
     * @param WeatherConfig $config
     * @param Curl $curl
     * @param Weather $weather
     * @param WeatherResourceModel $resourceWeather
     * @param RedirectFactory $redirectFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context                 $context,
        WeatherConfig           $config,
        Curl                    $curl,
        Weather                 $weather,
        WeatherResourceModel    $resourceWeather,
        RedirectFactory         $redirectFactory,
        DataPersistorInterface  $dataPersistor
    )
    {
        $this->context         =    $context;
        $this->config          =    $config;
        $this->curl            =    $curl;
        $this->weather         =    $weather;
        $this->resourceWeather =    $resourceWeather;
        $this->redirectFactory =    $redirectFactory;
        $this->dataPersistor   =    $dataPersistor;
        
        parent::__construct($context);
    }

    /**
     * @param $city
     * @return mixed
     * @throws \JsonException
     */
    protected function getWeatherData($city)
    {
        $endpoint = $this->config->getApiEndpoint();
        $key = $this->config->getApiKey();

        $url = "$endpoint/weather/?q=$city&appid=$key&units=metric";
        $this->curl->get($url);

        return json_decode($this->curl->getBody(), true);
    }

    /**
     * @param $data
     * @return array
     */
    public function extractWeatherData($data)
    {
        $dataTemp = $data['main'];
        $dataSys = $data['sys'];

        return [
            WeatherConfig::CITY => $data['name'],
            WeatherConfig::COUNTRY => $dataSys['country'],
            WeatherConfig::TEMPERATURE => $dataTemp['temp'],
            WeatherConfig::FEELS_LIKE => $dataTemp['feels_like'],
            WeatherConfig::PRESSURE => $dataTemp['pressure'],
            WeatherConfig::HUMIDITY => $dataTemp['humidity'],
            WeatherConfig::WIND_SPEED => $data['wind']['speed'],
            WeatherConfig::SUNRISE => $dataSys['sunrise'],
            WeatherConfig::SUNSET => $dataSys['sunset']
        ];
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $results = $this->getWeatherData($this->getRequest()->getParam('city'));

        if ($results['cod'] === 200) {
            $data = $this->extractWeatherData($results);
            $newWeather = $this->weather->setData($data);
            
            foreach ($data as $key => $value) {
                $this->dataPersistor->set($key, $value);
            }

            $this->resourceWeather->save($newWeather);
        }

        return $this->redirectFactory->create()->setRefererUrl();
    }
}
