<?php

namespace Alliance\SignUpSheet\Controller\Index;

use Alliance\SignUpSheet\Model\ResourceModel\User as UserResource;
use Alliance\SignUpSheet\Model\User;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\Message\ManagerInterface;

class Save extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{
    /** @var Context */
    private Context $context;

    /** @var UserResource */
    private UserResource $userResource;

    /** @var User */
    private User $user;



    public function __construct(
        Context $context,
        UserResource $userResource,
        User $model,
        ManagerInterface $messageManager
    ) {

        $this->userResource = $userResource;
        $this->user = $model;
        $this->messageManager = $messageManager;
        $this->context = $context;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $name = $this->getRequest()->getParam('name', false);
        $date = $this->getRequest()->getParam('date', false);

        $user = $this->user->setData([
            'name' => $name,
            'date' => $date
        ]);
        try {
            $user->save();
            $this->messageManager->addSuccess(__('Record was created successfully ' . $name));
        } catch (\Exception $e) {
            $this->messageManager->addError(__('Something Went Wrong'));
        }

        return $this->_redirect('signup');
    }
}
