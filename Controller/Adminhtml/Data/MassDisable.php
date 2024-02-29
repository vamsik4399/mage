<?php
/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */
namespace Mage\Import\Controller\Adminhtml\Data;

use Mage\Import\Model\Data;

class MassDisable extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $data->setIsActive(false);
        $this->dataRepository->save($data);
        return $this;
    }
}
