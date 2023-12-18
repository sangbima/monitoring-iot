<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "service_orders".
 *
 * @property int $id
 * @property string $uuid
 * @property int $package_id
 * @property float $total_price
 * @property string $status
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 * @property Packages $package
 */
class ServiceOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'package_id', 'total_price', 'status'], 'required'],
            [['package_id', 'created_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['package_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['total_price'], 'number'],
            [['uuid'], 'string', 'max' => 36],
            [['status'], 'string', 'max' => 20],
            [['uuid'], 'unique'],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Packages::class, 'targetAttribute' => ['package_id' => 'id']],
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
            'total_price' => 'Total Price',
            'status' => 'Status',
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
     * Gets query for [[Package]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PackagesQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Packages::class, ['id' => 'package_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ServiceOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ServiceOrdersQuery(get_called_class());
    }
}
