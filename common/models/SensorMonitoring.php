<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sensor_monitoring".
 *
 * @property int $id
 * @property string $uuid
 * @property int $sensor_id
 * @property float $reading_value
 * @property string|null $reading_timestamp
 * @property int|null $created_at
 *
 * @property SensorDevice $sensor
 */
class SensorMonitoring extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor_monitoring';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'sensor_id', 'reading_value'], 'required'],
            [['sensor_id', 'created_at'], 'default', 'value' => null],
            [['sensor_id', 'created_at'], 'integer'],
            [['reading_value'], 'number'],
            [['reading_timestamp'], 'safe'],
            [['uuid'], 'string', 'max' => 36],
            [['uuid'], 'unique'],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => SensorDevice::class, 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'sensor_id' => 'Sensor ID',
            'reading_value' => 'Reading Value',
            'reading_timestamp' => 'Reading Timestamp',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Sensor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SensorDeviceQuery
     */
    public function getSensor()
    {
        return $this->hasOne(SensorDevice::class, ['id' => 'sensor_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SensorMonitoringQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SensorMonitoringQuery(get_called_class());
    }
}
