<?php

namespace Alliance\Weather\Controller\Index;

use Alliance\Weather\Block\Weather;
use Alliance\Weather\Model\ResourceModel\Weather\CollectionFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;
use Magento\Framework\View\LayoutFactory;
use Psr\Log\LoggerInterface;

class GetPDF extends \Magento\Framework\App\Action\Action
{
    /** @var Context */
    private Context $context;

    /** @var CollectionFactory */
    private CollectionFactory $collectionFactory;

    /** @var LoggerInterface */
    private LoggerInterface $logger;

    /** @var LayoutFactory */
    private LayoutFactory $layoutFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param ResultFactory $resultFactory
     * @param LoggerInterface $logger
     * @param LayoutFactory $layoutFactory
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        ResultFactory $resultFactory,
        LoggerInterface $logger,
        LayoutFactory $layoutFactory
    )
    {
        $this->context = $context;
        $this->collectionFactory = $collectionFactory;
        $this->resultFactory = $resultFactory;
        $this->logger = $logger;
        $this->layoutFactory = $layoutFactory;
        parent::__construct($context);

    }

    /**
     * @return void
     */
    private function generatePDF(): void
    {
        try {
            $historicalDataHtml = $this->layoutFactory->create()
                ->createBlock(Weather::class)
                ->setTemplate('Alliance_Weather::pdf.phtml')
                ->toHtml();

            $html2pdf = new Html2Pdf('P', 'A4', 'fr');
            $html2pdf->writeHTML($historicalDataHtml);
            $html2pdf->output('test1.pdf', 'D');
        } catch (Html2PdfException $exception) {
            $html2pdf->clean();
            $this->logger->error($exception->getMessage());
        } catch (Html2PdfException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->generatePDF();

        return $this->resultFactory->create(ResultFactory::TYPE_RAW);
    }
}
