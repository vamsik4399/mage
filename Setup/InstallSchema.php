<?php

/*
 * Mage_Import

 * @category   Mage
 * @package    Mage_Import
 * @copyright  Copyright (c) 2019 Mage
 * @license    Mage
 * @version    2.0.0
 */

namespace Mage\Import\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('mage_import_data');

        if (!$installer->tableExists('mage_import_data')) {
            $table = $installer->getConnection()
                    ->newTable($tableName)
                    ->addColumn(
                            'data_id', Table::TYPE_INTEGER, null, [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                            ], 'Data ID'
                    )
                    ->addColumn(
                            'name', Table::TYPE_TEXT, 255, ['nullable' => false, 'default' => ''], 'Name'
                    )
                    ->addColumn(
                            'lastname', Table::TYPE_TEXT, 255, ['nullable' => false, 'default' => ''], 'Last Name'
                    )
                    ->addColumn(
                            'email', Table::TYPE_TEXT, null, ['nullable' => false, 'default' => ''], 'Email'
                    )
                    ->addColumn(
                            'phone', Table::TYPE_TEXT, null, ['nullable' => false, 'default' => ''], 'Phone'
                    )
                    ->addColumn(
                    'created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'Created At'
            );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }

}
