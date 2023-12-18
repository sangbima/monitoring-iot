<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sensor_device}}`.
 */
class m231218_130653_create_sensor_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sensor_device}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string(36)->unique()->notNull(),
            'serial_number' => $this->string(36)->unique()->notNull(),
            'sensor_name' => $this->string(50)->notNull(),
            'service_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createIndex('IDX-CreatedBy-sensor_device', '{{%sensor_device}}', 'created_by');
        $this->addForeignKey('FK-sensor_device-user', '{{%sensor_device}}', 'created_by', '{{%user}}', 'id');

        $this->createIndex('IDX-ServiceId-sensor_device', '{{%sensor_device}}', 'service_id');
        $this->addForeignKey('FK-sensor_device-service', '{{%sensor_device}}', 'service_id', '{{%services}}', 'id');

        $this->createIndex('IDX-ClientId-sensor_device', '{{%sensor_device}}', 'client_id');
        $this->addForeignKey('FK-sensor_device-client', '{{%sensor_device}}', 'client_id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-sensor_device-client', '{{%sensor_device}}');
        $this->dropIndex('IDX-ClientId-sensor_device', '{{%sensor_device}}');
        $this->dropForeignKey('FK-sensor_device-service', '{{%sensor_device}}');
        $this->dropIndex('IDX-ServiceId-sensor_device', '{{%sensor_device}}');
        $this->dropForeignKey('FK-sensor_device-user', '{{%sensor_device}}');
        $this->dropIndex('IDX-CreatedBy-sensor_device', '{{%sensor_device}}');
        $this->dropTable('{{%sensor_device}}');
    }
}
