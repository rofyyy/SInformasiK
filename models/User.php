<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $name
 * @property string|null $email
 * @property int|null $phone
 * @property string|null $address
 * @property string|null $gender
 * @property string|null $age
 * @property string|null $password
 * @property string|null $role
 * @property string|null $created_at
 * @property string|null $action
 * @property string|null $medicine
 * @property string|null $receipt
 * @property string|null $complaint
 */
class User extends ActiveRecord implements IdentityInterface
{

    /**
     * ENUM field values
     */
    const GENDER_MAN = 'man';
    const GENDER_WOMAN = 'woman';
    const ROLE_MASTER = 'master';
    const ROLE_EMPLOYEE = 'employee';
    const ROLE_USER = 'user';
    const ACTION_NOTINPROGRESS = 'notinprogress';
    const ACTION_INQUEUE = 'inqueue';
    const ACTION_PROSES = 'proses';
    const ACTION_PAYMENT = 'payment';
    const ACTION_COMPLETE = 'complete';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'email', 'phone', 'address', 'gender', 'age', 'password'], 'default', 'value' => null],
            [['phone'], 'integer'],
            [['gender', 'role', 'action'], 'string'],
            [['username', 'age'], 'string', 'max' => 50],
            [['name', 'email', 'address', 'password', 'created_at'], 'string', 'max' => 255],
            ['password', 'filter', 'filter' => function ($value) {
            return Yii::$app->security->generatePasswordHash($value);
            }],
            [['medicine', 'receipt', 'complaint'], 'string', 'max' => 250],
            ['gender', 'in', 'range' => array_keys(self::optsGender())],
            ['role', 'in', 'range' => array_keys(self::optsRole()), 'skipOnEmpty' => true],
            ['role', 'default', 'value' => self::ROLE_USER],
            ['action', 'in', 'range' => array_keys(self::optsAction()), 'skipOnEmpty' => true],
            [['created_at', 'medicine', 'receipt', 'complaint'], 'safe'],
            [['username', 'password'], 'required'], // Ensure username and password are required for login
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'gender' => 'Gender',
            'age' => 'Age',
            'password' => 'Password',
            'role' => 'Role',
            'created_at' => 'Created At',
            'action' => 'Action',
            'medicine' => 'Medicine',
            'receipt' => 'Receipt',
            'complaint' => 'Complaint',
        ];
    }


    /**
     * column gender ENUM value labels
     * @return string[]
     */
    public static function optsGender()
    {
        return [
            self::GENDER_MAN => 'man',
            self::GENDER_WOMAN => 'woman',
        ];
    }

    /**
     * column role ENUM value labels
     * @return string[]
     */
    public static function optsRole()
    {
        return [
            self::ROLE_MASTER => 'master',
            self::ROLE_EMPLOYEE => 'employee',
            self::ROLE_USER => 'user',
        ];
    }

    /**
     * column action ENUM value labels
     * @return string[]
     */
    public static function optsAction()
    {
        return [
            self::ACTION_NOTINPROGRESS => 'notinprogress',
            self::ACTION_INQUEUE => 'inqueue',
            self::ACTION_PROSES => 'proses',
            self::ACTION_PAYMENT => 'payment',
            self::ACTION_COMPLETE => 'complete',
        ];
    }

    /**
     * @return string
     */
    public function displayGender()
    {
        return self::optsGender()[$this->gender];
    }

    /**
     * @return bool
     */
    public function isGenderMan()
    {
        return $this->gender === self::GENDER_MAN;
    }

    public function setGenderToMan()
    {
        $this->gender = self::GENDER_MAN;
    }

    /**
     * @return bool
     */
    public function isGenderWoman()
    {
        return $this->gender === self::GENDER_WOMAN;
    }

    public function setGenderToWoman()
    {
        $this->gender = self::GENDER_WOMAN;
    }

    /**
     * @return string
     */
    public function displayRole()
    {
        return self::optsRole()[$this->role];
    }

    /**
     * @return bool
     */
    public function isRoleMaster()
    {
        return $this->role === self::ROLE_MASTER;
    }

    public function setRoleToMaster()
    {
        $this->role = self::ROLE_MASTER;
    }

    /**
     * @return bool
     */
    public function isRoleEmployee()
    {
        return $this->role === self::ROLE_EMPLOYEE;
    }

    public function setRoleToEmployee()
    {
        $this->role = self::ROLE_EMPLOYEE;
    }

    /**
     * @return bool
     */
    public function isRoleUser()
    {
        return $this->role === self::ROLE_USER;
    }

    public function setRoleToUser()
    {
        $this->role = self::ROLE_USER;
    }

    /**
     * @return string
     */
    public function displayAction()
    {
        return self::optsAction()[$this->action];
    }

    /**
     * @return bool
     */
    public function isActionNotinprogress()
    {
        return $this->action === self::ACTION_NOTINPROGRESS;
    }

    public function setActionToNotinprogress()
    {
        $this->action = self::ACTION_NOTINPROGRESS;
    }

    /**
     * @return bool
     */
    public function isActionInqueue()
    {
        return $this->action === self::ACTION_INQUEUE;
    }

    public function setActionToInqueue()
    {
        $this->action = self::ACTION_INQUEUE;
    }

    /**
     * @return bool
     */
    public function isActionProses()
    {
        return $this->action === self::ACTION_PROSES;
    }

    public function setActionToProses()
    {
        $this->action = self::ACTION_PROSES;
    }

    /**
     * @return bool
     */
    public function isActionPayment()
    {
        return $this->action === self::ACTION_PAYMENT;
    }

    public function setActionToPayment()
    {
        $this->action = self::ACTION_PAYMENT;
    }

    /**
     * @return bool
     */
    public function isActionComplete()
    {
        return $this->action === self::ACTION_COMPLETE;
    }

    public function setActionToComplete()
    {
        $this->action = self::ACTION_COMPLETE;
    }

    // Existing code

    /**
     * Finds a user by ID.
     *
     * @param int $id
     * @return static|null
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; 
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null; // Tidak digunakan untuk fitur dasar
    }

    public function validateAuthKey($authKey)
    {
        return true; // Tidak digunakan untuk fitur dasar
    }

    
}
