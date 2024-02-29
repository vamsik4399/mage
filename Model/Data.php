<?php

/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */

namespace Mage\Import\Model;

use Magento\Framework\Model\AbstractModel;
use Mage\Import\Api\Data\DataInterface;

class Data extends AbstractModel implements DataInterface {

    /**
     * Cache tag
     */
    const CACHE_TAG = 'mage_import_data';

    /**
     * Initialise resource model
     * @codingStandardsIgnoreStart
     */
    protected function _construct() {
        // @codingStandardsIgnoreEnd
        $this->_init('Mage\Import\Model\ResourceModel\Data');
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities() {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->getData(DataInterface::DATA_TITLE);
    }

    /**
     * Set name
     *
     * @param $title
     * @return $this
     */
    public function setName($title) {
        return $this->setData(DataInterface::DATA_TITLE, $title);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getLastname() {
        return $this->getData(DataInterface::DATA_LASTNAME);
    }

    /**
     * Set name
     *
     * @param $title
     * @return $this
     */
    public function setLastname($title) {
        return $this->setData(DataInterface::DATA_LASTNAME, $title);
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->getData(DataInterface::DATA_DESCRIPTION);
    }

    /**
     * Set email
     *
     * @param $description
     * @return $this
     */
    public function setEmail($description) {
        return $this->setData(DataInterface::DATA_DESCRIPTION, $description);
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone() {
        return $this->getData(DataInterface::DATA_PHONE);
    }

    /**
     * Set phone
     *
     * @param $title
     * @return $this
     */
    public function setPhone($title) {
        return $this->setData(DataInterface::DATA_PHONE, $title);
    }

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt() {
        return $this->getData(DataInterface::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt) {
        return $this->setData(DataInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt() {
        return $this->getData(DataInterface::UPDATED_AT);
    }

    /**
     * Set updated at
     *
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt) {
        return $this->setData(DataInterface::UPDATED_AT, $updatedAt);
    }

}
