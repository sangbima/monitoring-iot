<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service_orders}}`.
 */
class m231218_130552_create_service_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service_orders}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string(36)->unique()->notNull(),
            'package_id' => $this->integer()->notNull(),
            'total_price' => $this->decimal(20, 2)->notNull(),
            'status' => $this->string(20)->notNull(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createIndex('IDX-PackageId-service_orders', '{{%service_orders}}', 'package_id');
        $this->addForeignKey('FK-service_orders-packages', '{{%service_orders}}', 'package_id', '{{%packages}}', 'id');

        $this->createIndex('IDX-CreatedBy-service_orders', '{{%service_orders}}', 'created_by');
        $this->addForeignKey('FK-service_orders-user', '{{%service_orders}}', 'created_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-service_orders-user', '{{%service_orders}}');
        $this->dropIndex('IDX-CreatedBy-service_orders', '{{%service_orders}}');
        $this->dropForeignKey('FK-service_orders-packages', '{{%service_orders}}');
        $this->dropIndex('IDX-PackageId-service_orders', '{{%service_orders}}');
        $this->dropTable('{{%service_orders}}');
    }
}
