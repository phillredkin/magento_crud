<?php
namespace GymBeam\CrudTest\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class CrudTest extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('GymBeam\CrudTest\Model\ResourceModel\CrudTest');
    }
}
