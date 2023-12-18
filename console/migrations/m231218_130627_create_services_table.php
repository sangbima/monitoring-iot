<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m231218_130627_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string(36)->unique()->notNull(),
            'package_id' => $this->integer()->notNull(),
            'package_name' => $this->string(50)->notNull(),
            'total_price' => $this->decimal(20, 2)->notNull(),
            'start_at' => $this->datetime(),
            'end_at' => $this->datetime(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createIndex('IDX-CreatedBy-services', '{{%services}}', 'created_by');
        $this->addForeignKey('FK-services-user', '{{%services}}', 'created_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
