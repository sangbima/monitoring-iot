<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Ramsey\Uuid\Uuid;

/**
 * User model
 *
 * @property integer $id
 * @property string $uuid
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $fullname
 * @property string $auth_key
 * @property integer $status
 * @property integer $parent_user_id
 * @property string $role
 * @property boolean $is_change_password 
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * 
 * @property SensorDevice[] $sensorDevicesByClient
 * @property SensorDevice[] $sensorDevicesByUserCreated
 * @property ServiceOrders[] $serviceOrders
 * @property Services[] $services
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const SCENARIO_CREATE = 'create';

    const ROLE_OWNER = 'owner';
    const ROLE_MEMBER = 'member';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }


    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_CREATE => ['password_hash', 'email', 'status', 'fullname', 'auth_key'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid'], 'string', 'max' => 36],
            [['email', 'fullname', 'auth_key'], 'required'],
            [['auth_key', 'password_hash'], 'required', 'on' => self::SCENARIO_CREATE],
            [['auth_key', 'password_hash', 'created_at', 'updated_at', 'uuid'], 'safe'],
            [['created_at', 'updated_at', 'parent_user_id'], 'integer'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['role', 'default', 'value' => self::ROLE_MEMBER],
            ['role', 'in', 'range' => [self::ROLE_MEMBER, self::ROLE_OWNER]],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['email'], 'string', 'max' => 150],
            [['fullname'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['is_change_password'], 'boolean'],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uuid' => 'UUID',
            'email' => 'Email',
            'fullname' => 'Fullname',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'role' => 'Role',
            'parent_user_id' => 'Parent',
            'is_change_password' => 'User must change password when login',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[SensorDevicesByClient]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SensorDeviceQuery
     */
    public function getSensorDevicesByClient()
    {
        return $this->hasMany(SensorDevice::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[SensorDevicesByUserCreated]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SensorDeviceQuery
     */
    public function getSensorDevicesByUserCreated()
    {
        return $this->hasMany(SensorDevice::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[ServiceOrders]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ServiceOrdersQuery
     */
    public function getServiceOrders()
    {
        return $this->hasMany(ServiceOrders::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ServicesQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::class, ['created_by' => 'id']);
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
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function softDelete()
    {
        $this->status = self::STATUS_DELETED;
        return $this->save(false);
    }

    public function getLabelStatusUser()
    {
        $statusLabel = [
            self::STATUS_ACTIVE => '<span class="badge bg-success">Active</span>',
            self::STATUS_INACTIVE => '<span class="badge bg-warning">Inactive</span>',
            self::STATUS_DELETED => '<span class="badge bg-danger">Deleted</span>',
        ];

        return $statusLabel[$this->status];
    }

    public function getLabelPasswordMustChange()
    {
        $label = '<span class="badge bg-info">No</span>';
        if ($this->is_change_password) {
            $label = '<span class="badge bg-success">Yes</span>';
        }

        return $label;
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserQuery(get_called_class());
    }
}
