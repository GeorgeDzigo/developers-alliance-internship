<?php


namespace Mastering\SampleData\Cron;

use Mastering\SampleData\Model\ItemFactory;
use Mastering\SameplData\Model\Config;
class AddItem
{
    private ItemFactory $itemFactory;

    private $config;

    public function __construct(
        ItemFactory $itemFactory,
        Config $config
    )
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    /**
     * Cronjob Description
     *
     * @return void
     */
    public function execute(): void
    {
        if($this->config->isEnabled()) {
            $this->itemFactory->create()
                ->setName('Scheduled Item')
                ->setDescription('Created at . ' . time())
                ->save();
        }
    }
}
