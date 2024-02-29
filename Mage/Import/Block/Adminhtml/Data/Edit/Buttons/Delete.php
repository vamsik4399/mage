<?php
/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */
namespace Mage\Import\Block\Adminhtml\Data\Edit\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * Get button attributeså
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getDataId()) {
            $data = [
                'label' => __('Delete Data'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __(
                    'Are you sure you want to do this?'
                ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Get delete URL
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['data_id' => $this->getDataId()]);
    }
}
