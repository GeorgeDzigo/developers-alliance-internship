<?php

namespace Alliance\CustomExtension\Block\Edit;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Index extends Template
{
    /** @var CustomerRepositoryInterface */
    private CustomerRepositoryInterface $customerRepository;

    /** @var Session */
    private Session $customerSession;

    /** @var string */
    protected const ATTR_CODE = 'linkedin_profile';

    /**
     * @param Context $context
     * @param array $data
     * @param CustomerRepositoryInterface $customerRepositoryInterface
     * @param Session $cutomerSession
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        Session $cutomerSession

    )
    {
        $this->customerRepository = $customerRepositoryInterface;
        $this->customerSession = $cutomerSession;

        parent::__construct($context, $data);
    }

    public function getLinkedInProfile() {
        $customerId = $this->customerSession->getCustomer()->getId();

        $customer = $this->customerRepository->getById($customerId);
        
        $attribute = $customer->getCustomAttribute(self::ATTR_CODE);

        print_r($attribute->getValue());
    }
}
