<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $birthday
 * @property string $phone
 * @property string $address
 * @property string $create_date
 * @property string $update_date
 * @property integer $disable
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['birthday', 'create_date', 'update_date'], 'safe'],
            [['disable'], 'integer'],
            [['username', 'name'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'username' => Yii::t('admin', 'Username'),
            'password' => Yii::t('admin', 'Password'),
            'name' => Yii::t('admin', 'Name'),
            'birthday' => Yii::t('admin', 'Birthday'),
            'phone' => Yii::t('admin', 'Phone'),
            'address' => Yii::t('admin', 'Address'),
            'create_date' => Yii::t('admin', 'Create Date'),
            'update_date' => Yii::t('admin', 'Update Date'),
            'disable' => Yii::t('admin', 'Disable'),
        ];
    }
}
