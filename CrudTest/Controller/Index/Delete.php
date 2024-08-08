<?php

namespace GymBeam\CrudTest\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use GymBeam\CrudTest\Model\CrudTestFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Delete extends Action
{
    protected $crudTestFactory;
    protected $request;
    protected $resultRedirectFactory;

    public function __construct(Context $context, CrudTestFactory $crudTestFactory, RequestInterface $request, RedirectFactory $resultRedirectFactory) {
        $this->crudTestFactory = $crudTestFactory;
        $this->request = $request;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute() {
        $id = $this->request->getParam('id');
        if ($id) {
            $crudTestModel = $this->crudTestFactory->create()->load($id);
            if ($crudTestModel->getId()) {
                try {
                    $crudTestModel->delete();
                    $this->messageManager->addSuccessMessage(__('The record has been deleted :)'));
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__($e->getMessage()));
                }
            } else {
                $this->messageManager->addErrorMessage(__('Record does not exist :|'));
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}
