<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $fullname
 * @property string $avatar
 * @property int $gender
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property int $is_admin
 * @property int $group
 * @property string $username
 * @property string $password
 * @property string $note
 * @property int $date_created
 * @property int $limit_login
 * @property int $idRole
 * @property string $password_reset_token
 * @property string $password_hash
 * @property string $verification_token
 * @property string $auth_key
 * @property int $status
 */
class Member extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 1;
    const STATUS_INACTIVE = 3;
    const STATUS_ACTIVE = 5;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'is_admin', 'group', 'username', 'password', 'date_created', 'limit_login', 'status'], 'required'],
            [['gender', 'is_admin', 'group', 'date_created', 'limit_login', 'idRole', 'status'], 'integer'],
            [['note'], 'string'],
            [['fullname', 'avatar', 'address', 'username', 'password', 'password_reset_token', 'password_hash', 'verification_token', 'auth_key'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'avatar' => 'Avatar',
            'gender' => 'Gender',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'is_admin' => 'Is Admin',
            'group' => 'Group',
            'username' => 'Username',
            'password' => 'Password',
            'note' => 'Note',
            'date_created' => 'Date Created',
            'limit_login' => 'Limit Login',
            'idRole' => 'Id Role',
            'password_reset_token' => 'Password Reset Token',
            'password_hash' => 'Password Hash',
            'verification_token' => 'Verification Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
        ];
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
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findUser($username,$password)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE,'password' => $password]);
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
    public static function findByVerificationToken($token) {
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
        return $this->password === $password;
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
}
