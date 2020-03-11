<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string|null $title
 * @property string $text
 * @property string $category
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $logged_at
 */
class Message extends \yii\db\ActiveRecord
{
    const STATUS_NOT_ACTIVE = 0;

    const STATUS_ACTIVE = 1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'category'], 'required'],
            [['text'], 'string'],
            [['category'], 'safe'],
            [['status', 'created_at', 'updated_at', 'logged_at','counter'], 'integer'],
            [['title'], 'string', 'max' => 240],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'category' => 'Category',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'logged_at' => 'Logged At',
            'counter' => 'просмотры',
        ];
    }


    /**
     * Returns user statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_NOT_ACTIVE => Yii::t('common', 'Not Active'),
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),

        ];
    }


    /**
     * {@inheritdoc}
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }
}
