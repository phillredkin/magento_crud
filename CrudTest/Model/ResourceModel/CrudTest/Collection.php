<?php
namespace GymBeam\CrudTest\Model\ResourceModel\CrudTest;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('GymBeam\CrudTest\Model\CrudTest', 'GymBeam\CrudTest\Model\ResourceModel\CrudTest');
    }
}
