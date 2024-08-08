<?php

namespace GymBeam\CrudTest\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use GymBeam\CrudTest\Model\CrudTestFactory;
class Form extends Template {

    private $crudTestFactory;

    public function __construct(CrudTestFactory $crudTestFactory, Context $context, array $data = [])
    {
        parent::__construct($context, $data);
        $this->crudTestFactory = $crudTestFactory;
    }

    public function getFormAction()
    {
        return $this->getUrl('crudtest/index/submit', ['_secure' => true]);
    }

    public function getAllData() {
        $id = $this->getRequest()->getParam('id');
        $model = $this->crudTestFactory->create();

        return $model->load($id);
    }
}
