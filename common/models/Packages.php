<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Ramsey\Uuid\Uuid;

/**
 * This is the model class for table "packages".
 *
 * @property int $id
 * @property string $uuid
 * @property string $package_name
 * @property int $sensor_count
 * @property float $price
 * @property bool|null $highlight
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property UserAdmin $createdBy
 * @property Discounts[] $discounts
 * @property ServiceOrders[] $serviceOrders
 */
class Packages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'safe'],
            [['package_name', 'sensor_count', 'price'], 'required'],
            [['sensor_count', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'default', 'value' => null],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['sensor_count'], 'integer', 'min' => 1],
            [['price'], 'number'],
            [['highlight'], 'boolean'],
            [['uuid'], 'string', 'max' => 36],
            [['package_name'], 'string', 'max' => 50],
            [['package_name'], 'unique'],
            [['uuid'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => UserAdmin::class, 'targetAttribute' => ['created_by' => 'id']],
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
            'package_name' => 'Package Name',
            'sensor_count' => 'Sensor Count',
            'price' => 'Price (Rp)',
            'highlight' => 'Highlight',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $uuid = Uuid::uuid7();
            $this->uuid = $uuid->toString();
        }

        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserAdminQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(UserAdmin::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Discounts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\DiscountsQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discounts::class, ['package_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceOrders]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ServiceOrdersQuery
     */
    public function getServiceOrders()
    {
        return $this->hasMany(ServiceOrders::class, ['package_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PackagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PackagesQuery(get_called_class());
    }
}
