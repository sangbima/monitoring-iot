<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%packages}}`.
 */
class m231218_130509_create_packages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%packages}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string(36)->unique()->notNull(),
            'package_name' => $this->string(50)->unique()->notNull(),
            'sensor_count' => $this->integer()->notNull(),
            'price' => $this->decimal(20, 2)->notNull(),
            'highlight' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        $this->createIndex('IDX-CreatedBy-packages', '{{%packages}}', 'created_by');
        $this->addForeignKey('FK-packages-user_admin', '{{%packages}}', 'created_by', '{{%user_admin}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-packages-user_admin', '{{%packages}}');
        $this->dropIndex('IDX-CreatedBy-packages', '{{%packages}}');
        $this->dropTable('{{%packages}}');
    }
}
