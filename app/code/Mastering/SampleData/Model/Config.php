<?php

namespace Mastering\SampleData\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLED = 'mastering/general/enabled';
    const XML_PATH_CRON_EXPRESSION = 'mastering/general/cron-expression';

    private $config;

    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    public function isEnabled() {
        return $this->config->getValue(self::XML_PATH_ENABLED);
    }
}
