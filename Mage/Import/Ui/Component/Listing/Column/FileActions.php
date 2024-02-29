<?php

/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */

namespace Mage\Import\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;

class FileActions extends Column {

    const URL_PATH_EDIT = 'import/data/edit';
    const URL_PATH_DELETE = 'import/data/delete';

    /**
     * URL builder
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
    ContextInterface $context, UiComponentFactory $uiComponentFactory, UrlInterface $urlBuilder, StoreManagerInterface $storeManagerInterface, array $components = [], array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->url = $storeManagerInterface;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource) {

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['data_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                    static::URL_PATH_EDIT, [
                                'data_id' => $item['data_id']
                                    ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                    static::URL_PATH_DELETE, [
                                'data_id' => $item['data_id']
                                    ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete "${ $.$data.data_title }"'),
                                'message' => __('Are you sure you want to delete the Data: "${ $.$data.data_title }"?')
                            ]
                        ]
                    ];
                }
            }
        }



        return $dataSource;
    }

}
