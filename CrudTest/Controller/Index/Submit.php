<?php

namespace GymBeam\CrudTest\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use GymBeam\CrudTest\Model\CrudTestFactory;

class Submit extends Action {
    protected $resultPageFactory;
    protected $crudTestFactory;
    private $url;

    public function __construct(UrlInterface $url, Context $context, PageFactory $resultPageFactory, CrudTestFactory $crudTestFactory) {
        $this->resultPageFactory = $resultPageFactory;
        $this->crudTestFactory = $crudTestFactory;
        $this->url = $url;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $model = $this->crudTestFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully :)"));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("We can't submit your request, Please try again. Error: %1", $e->getMessage()));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->url->getUrl('crudtest/index/showdata'));
        return $resultRedirect;
    }
}
