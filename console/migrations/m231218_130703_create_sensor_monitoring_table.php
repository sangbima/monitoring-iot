<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sensor_monitoring}}`.
 */
class m231218_130703_create_sensor_monitoring_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sensor_monitoring}}', [
            'id' => $this->primaryKey(),
            'uuid' => $this->string(36)->unique()->notNull(),
            'sensor_id' => $this->integer()->notNull(),
            'reading_value' => $this->decimal(20, 2)->notNull(),
            'reading_timestamp' => $this->datetime(),
            'created_at' => $this->integer(),
        ]);

        $this->createIndex('IDX-SensorId-sensor_monitoring', '{{%sensor_monitoring}}', 'sensor_id');
        $this->addForeignKey('FK-sensor_monitoring-sensor_device', '{{%sensor_monitoring}}', 'sensor_id', '{{%sensor_device}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK-sensor_monitoring-sensor_device', '{{%sensor_monitoring}}');
        $this->dropIndex('IDX-SensorId-sensor_monitoring', '{{%sensor_monitoring}}');
        $this->dropTable('{{%sensor_monitoring}}');
    }
}
