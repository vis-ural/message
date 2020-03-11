<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "whatsapp_groups".
 *
 * @property string $id Unique message identifier
 * @property string $desc For text messages, the actual UTF-8 text of the message max message length 4096 char utf8mb4
 * @property string $name A chat title was changed to this value
 * @property string $group_id
 */
class WhatsappGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'whatsapp_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc','group_id'], 'string'],
            [['name'], 'string', 'max' => 25],
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
            'name' => 'Name',
        ];
    }
}
