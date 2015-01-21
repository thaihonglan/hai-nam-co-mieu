<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $title
 * @property string $content
 * @property string $create_date
 * @property string $update_date
 * @property integer $disable
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'disable', 'pageview'], 'integer'],
            [['content'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['title'], 'string', 'max' => 255]
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
            'create_date' => Yii::t('admin', 'Create Date'),
            'update_date' => Yii::t('admin', 'Update Date'),
            'disable' => Yii::t('admin', 'Disable'),
        ];
    }
}
