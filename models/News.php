<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $title
 * @property string $content
 * @property integer $category_id
 * @property string $create_date
 * @property string $update_date
 * @property integer $disable
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'disable', 'pageview'], 'integer'],
            [['content'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['title', 'category_name', 'avatar'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1024],
            
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
            'title' => Yii::t('admin', 'Title'),
            'content' => Yii::t('admin', 'Content'),
            'category_id' => Yii::t('admin', 'Category ID'),
            'category_name' => Yii::t('admin', 'Category Name'),
            'create_date' => Yii::t('admin', 'Create Date'),
            'update_date' => Yii::t('admin', 'Update Date'),
            'disable' => Yii::t('admin', 'Disable'),
        ];
    }
}
