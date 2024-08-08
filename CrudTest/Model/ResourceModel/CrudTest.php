<?php
namespace GymBeam\CrudTest\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class CrudTest extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('gymbeam_crud_test', 'id');
    }
}
