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

class Reset implements ButtonProviderInterface
{
    /**
     * Get button attributes
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
