<?php

/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */

namespace Mage\Import\Api\Data;

interface DataInterface {

    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const DATA_ID = 'data_id';
    const DATA_TITLE = 'name';
    const DATA_DESCRIPTION = 'email';
    const DATA_PHONE = 'phone';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DATA_LASTNAME = 'lastname';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param $id
     * @return DataInterface
     */
    public function setId($id);

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param $title
     * @return mixed
     */
    public function setName($title);

    /**
     * Get Name
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set Name
     *
     * @param $title
     * @return mixed
     */
    public function setLastname($title);

    /**
     * Get Email
     *
     * @return mixed
     */
    public function getEmail();

    /**
     * Set Email
     *
     * @param $description
     * @return mixed
     */
    public function setEmail($description);

    /**
     * Get Phone
     *
     * @return string
     */
    public function getPhone();

    /**
     * Set Phone
     *
     * @param $title
     * @return mixed
     */
    public function setPhone($title);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * set created at
     *
     * @param $createdAt
     * @return DataInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * set updated at
     *
     * @param $updatedAt
     * @return DataInterface
     */
    public function setUpdatedAt($updatedAt);
}
