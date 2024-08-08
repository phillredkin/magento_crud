<?php

namespace GymBeam\CrudTest\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use GymBeam\CrudTest\Model\CrudTestFactory;

class Index extends \Magento\Framework\App\Action\Action {
    protected $resultPageFactory;

    private $crudTestFactory;
    private $url;

    public function __construct(UrlInterface $url, CrudTestFactory $crudTestFactory, Context $context, PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->crudTestFactory = $crudTestFactory;
        $this->url = $url;
    }

    public function execute() {
        if ($this->isCorrectData()) {
            return $this->resultPageFactory->create();
        } else {
            $this->messageManager->addErrorMessage(__('Record was not found :('));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->url->getUrl('crudtest/index/showdata'));

            return $resultRedirect;
        }
    }

    public function isCorrectData() {
        if ($id = $this->getRequest()->getParam('id')) {
            $model = $this->crudTestFactory->create();
            $model->load($id);
            if ($model->getId()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

}
