<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $uuid
 * @property int $package_id
 * @property string $package_name
 * @property float $total_price
 * @property string|null $start_at
 * @property string|null $end_at
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 * @property SensorDevice[] $sensorDevices
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'package_id', 'package_name', 'total_price'], 'required'],
            [['package_id', 'created_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['package_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['total_price'], 'number'],
            [['start_at', 'end_at'], 'safe'],
            [['uuid'], 'string', 'max' => 36],
            [['package_name'], 'string', 'max' => 50],
            [['uuid'], 'unique'],
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
            'package_id' => 'Package ID',
            'package_name' => 'Package Name',
            'total_price' => 'Total Price',
            'start_at' => 'Start At',
            'end_at' => 'End At',
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
     * Gets query for [[SensorDevices]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SensorDeviceQuery
     */
    public function getSensorDevices()
    {
        return $this->hasMany(SensorDevice::class, ['created_by' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ServicesQuery(get_called_class());
    }
}
