<?php

namespace common\modules\queuemanager\models;

use common\models\MessagePlan;
use common\models\Order;
use common\models\Product;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $name
 * @property string $status
 * @property string $job_name
 * @property string $command
 * @property integer $pid
 * @property string $created
 * @property string $updated
 * @property string $queue
 * @property string $exchange
 * @property string $tag
 * @property string $key
 * @property integer $order_id
 * @property string $data_send
 * @property string $subcatid
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'queue_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'command', 'key'], 'required'],
            [['pid', 'status','order_id','subcatid'], 'integer'],
            [['created', 'updated','name'], 'safe'],
            [[ 'tag','data_send'], 'string', 'max' => 50],
            [[ 'queue', 'exchange'], 'string', 'max' => 250],
            [['key'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('direct', 'ID'),
            'name' => Yii::t('direct', 'Name'),
            'status' => Yii::t('direct', 'Status'),
            'job_name' => Yii::t('direct', 'Job Name'),
            'command' => Yii::t('direct', 'Command'),
            'pid' => Yii::t('direct', 'Pid'),
            'created' => Yii::t('direct', 'Created'),
            'updated' => Yii::t('direct', 'Updated'),
            'queue' => Yii::t('direct', 'Queue'),
            'exchange' => Yii::t('direct', 'Exchange'),
            'tag' => Yii::t('direct', 'Tag'),
        ];
    }

    /**
     * @inheritdoc
     * @return TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TaskQuery(get_called_class());
    }


    public static function getTypes($status = false)
    {
        $statuses = [
             'publish',

        ];
        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }

    public  function getTypeView()
    {
        $statuses = self::getTypes();
        return $statuses[$this->name];
    }

    public  function getView()
    {
       $str = json_decode($this->job_name,true)['title'];

        $str = str_replace("-","",$str);
        $str = str_replace(".","",$str);
      return $str;

    }

    public  function getBody()
    {
        $str = json_decode($this->job_name,true)['body'];


        return $str;

    }


    public static function getStatuses($status = false)
    {
        $statuses = [
            1 => 'Новая',
            2 => 'Выполнена',

        ];
        return $status !== false ? ArrayHelper::getValue($statuses, $status) : $statuses;
    }




}
