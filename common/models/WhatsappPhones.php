<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "whatsapp_phones".
 *
 * @property string $id Unique message identifier
 * @property string $desc For text messages, the actual UTF-8 text of the message max message length 4096 char utf8mb4
 * @property string $fio A chat title was changed to this value
 * @property string $photo Array of PhotoSize objects. A chat photo was change to this value
 * @property string $phone Informs that the chat photo was deleted
 */
class WhatsappPhones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'whatsapp_phones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id'], 'required'],
            [['id'], 'integer'],
            [['desc', 'photo'], 'string'],
            [['fio', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'desc' => 'Desc',
            'fio' => 'Fio',
            'photo' => 'Photo',
            'phone' => 'Phone',
        ];
    }
}
