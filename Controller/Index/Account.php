<?php

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mage\Import\Controller\Index;

use Zend\Log\Filter\Timestamp;

/**
 * Responsible for loading page content.
 *
 * This is a basic controller that only loads the corresponding layout file. It may duplicate other such
 * controllers, and thus it is considered tech debt. This code duplication will be resolved in future releases.
 */
class Account extends \Magento\Framework\App\Action\Action {

    const XML_PATH_EMAIL_RECIPIENT_NAME = 'trans_email/ident_support/name';
    const XML_PATH_EMAIL_RECIPIENT_EMAIL = 'trans_email/ident_support/email';

    protected $_inlineTranslation;
    protected $_transportBuilder;
    protected $_scopeConfig;
    protected $_logLoggerInterface;
    protected $_storeManager;
    protected $_filesystem;
    protected $_fileUploaderFactory;

    public function __construct(
    \Magento\Framework\App\Action\Context $context, \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation, \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Psr\Log\LoggerInterface $loggerInterface, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\Filesystem $filesystem, \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory, \Magento\Framework\Filesystem\Io\File $file, \Magento\Framework\Api\DataObjectHelper $dataObjectHelper, \Mage\Import\Api\Data\DataInterfaceFactory $dataFactory, \Mage\Import\Api\DataRepositoryInterface $dataRepository, \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remote, array $data = []
    ) {
        $this->_inlineTranslation = $inlineTranslation;
        $this->_transportBuilder = $transportBuilder;
        $this->_scopeConfig = $scopeConfig;
        $this->_logLoggerInterface = $loggerInterface;
        $this->messageManager = $context->getMessageManager();
        $this->_storeManager = $storeManager;
        $this->_filesystem = $filesystem;
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->_file = $file;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataFactory = $dataFactory;
        $this->dataRepository = $dataRepository;
        $this->remote = $remote;

        parent::__construct($context);
    }

    /**
     * Load the page defined in view/frontend/layout/samplenewpage_index_index.xml
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute() {
        $data = $this->getRequest()->getPostValue();

        $id = $this->getRequest()->getParam('data_id');
        if ($id) {
            $model = $this->dataRepository->getById($id);
        } else {
            unset($data['data_id']);
            $model = $this->dataFactory->create();
        }
        try {
            $this->dataObjectHelper->populateWithArray($model, $data, Mage\Import\Api\Data\DataInterface::class);
            $this->dataRepository->save($model);

            $this->messageManager->addSuccess('Your account is created successfully. We will contact you soon.');
            $this->_redirect('imports');
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
    }

}
