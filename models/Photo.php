<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $image
 * @property integer $category_id
 * @property integer $album_id
 * @property string $create_date
 * @property string $update_date
 * @property integer $disable
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'album_id', 'disable'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'user_id' => Yii::t('admin', 'User who post this'),
            'image' => Yii::t('admin', 'Image'),
            'category_id' => Yii::t('admin', 'Category ID'),
            'album_id' => Yii::t('admin', 'Album ID'),
            'create_date' => Yii::t('admin', 'Create Date'),
            'update_date' => Yii::t('admin', 'Update Date'),
            'disable' => Yii::t('admin', 'Disable'),
        ];
    }
}
