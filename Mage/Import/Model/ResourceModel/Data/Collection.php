<?php
/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */
namespace Mage\Import\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     * @codingStandardsIgnoreStart
     */
    protected $_idFieldName = 'data_id';

    /**
     * Collection initialisation
     */
    protected function _construct()
    {
        // @codingStandardsIgnoreEnd
        $this->_init('Mage\Import\Model\Data', 'Mage\Import\Model\ResourceModel\Data');
    }
}
