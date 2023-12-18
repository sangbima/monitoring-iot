<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sensor_device".
 *
 * @property int $id
 * @property string $uuid
 * @property string $serial_number
 * @property string $sensor_name
 * @property int $service_id
 * @property int $client_id
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 * @property Services $service
 * @property User $client
 * @property SensorMonitoring[] $sensorMonitorings
 */
class SensorDevice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor_device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'serial_number', 'sensor_name', 'service_id', 'client_id'], 'required'],
            [['service_id', 'client_id', 'created_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['service_id', 'client_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['uuid', 'serial_number'], 'string', 'max' => 36],
            [['sensor_name'], 'string', 'max' => 50],
            [['serial_number'], 'unique'],
            [['uuid'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['created_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'serial_number' => 'Serial Number',
            'sensor_name' => 'Sensor Name',
            'service_id' => 'Service ID',
            'client_id' => 'Client ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ServicesQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[SensorMonitorings]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SensorMonitoringQuery
     */
    public function getSensorMonitorings()
    {
        return $this->hasMany(SensorMonitoring::class, ['sensor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SensorDeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SensorDeviceQuery(get_called_class());
    }
}
