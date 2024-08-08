<?php

namespace GymBeam\CrudTest\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use GymBeam\CrudTest\Model\ResourceModel\CrudTest\CollectionFactory;

class Showdata extends Template {
    protected $collectionFactory;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collectionFactory->create();
    }

    public function getDeleteAction() {
        return $this->getUrl('crudtest/index/delete', ['_secure' => true]);
    }

    public function getEditAction() {
        return $this->getUrl('crudtest/index/index', ['_secure' => true]);
    }
}
