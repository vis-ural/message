<?php

namespace common\modules\queuemanager\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\query\MessagePlanQuery;
/**
 * This is the model class for table "message_plan".
 *
 * @property integer $id
 * @property string $name
 * @property string $category
 * @property integer $event_id
 * @property integer $time
 * @property string $view
 * @property string $script
 * @property string $type
 * @property integer $status
 * @property string $desc
 */
class MessagePlan extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLE = 0;

    const CATEGORY_ZAKAZ = 1;

    const TYPE_SMS      = 1;
    const TYPE_SLACK    = 2;
    const TYPE_EMAL     = 3;
    const TYPE_PHONE    = 4;
    const TYPE_SOCKET   = 5;
    const TYPE_ADD_LEAD  = 'new_lead';
    const TYPE_ADD_LEAD_AMO  = 'new_lead_amo';



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queue_message_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category', 'event_id', 'time', 'view'], 'required'],
            [['event_id', 'time', 'status','order','template_id'], 'integer'],
            [['script', 'desc'], 'string'],
            [['name', 'category'], 'string', 'max' => 1024],
            [['view', 'type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название собития',
            'category' => 'Category',
            'event_id' => 'событие ',
            'time' => 'время после события (д.)',
            'view' => 'View',
            'script' => 'Script',
            'type' => 'phone sms email',
            'status' => 'Status',
            'desc' => 'Desc',
        ];
    }

    /**
     * @inheritdoc
     * @return MessagePlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessagePlanQuery(get_called_class());
    }



    public static function getCategories($status = false)
    {
        $statuses = [
            self::CATEGORY_ZAKAZ => 'План по заказам',
        ];
        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }




    public static function getTypes($status = false)
    {
        $statuses = [
            self::TYPE_SMS => 'Sms',
            self::TYPE_EMAL => 'Email',
            self::TYPE_SLACK => 'Slack',
            self::TYPE_PHONE => 'Phone',
            self::TYPE_SOCKET => 'Socket',
        ];
        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }


    public static function getEvents($status = false)
    {
        $statuses = \yii\helpers\ArrayHelper::map(\common\models\ShopEvent::find()->all(), 'id', 'name');

        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }

    public static function getStatuses($status = false)
    {
        $statuses = [
            self::STATUS_ACTIVE => 'Включено',
            self::STATUS_DISABLE => 'Выключено',

        ];
        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }

}