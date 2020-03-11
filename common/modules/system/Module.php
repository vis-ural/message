<?php

namespace common\modules\system;
use common\models\TimelineEvent;
use common\modules\system\models\SystemLog;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * system module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\system\controllers';
    public $adminPermission = 'system-module';

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => [$this->adminPermission]
                        ]
                    ]
                ]
            ]
        );
    }
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }


    public static function getMenuItems(){


        return

            [
                'label' => Yii::t('backend', 'Workspace'),
                'url' => '#',
                'icon' => '<i class="fa fa-dashboard"></i>',
                'options' => ['class' => 'treeview'],
                'active' => ((Yii::$app->controller->module->id == 'system')
                        && ((Yii::$app->controller->id == 'log')
                            ||  (Yii::$app->controller->id == 'information')
                            ||  (Yii::$app->controller->id == 'cache')))
                    || (Yii::$app->controller->module->id == 'user') || (Yii::$app->controller->module->id == 'modulemanager')
                    || ((Yii::$app->controller->module->id == 'backend')
                        && (Yii::$app->controller->id == 'timeline-event')),
                'visible' => Yii::$app->user->can('system-module'),
                'items' => [
                    [
                        'label' => Yii::t('backend', 'Timeline'),
                        'icon' => '<i class="fa fa-bar-chart-o"></i>',
                        'url' => ['/timeline-event/index'],
                        'badge' => TimelineEvent::find()->today()->count(),
                        'badgeBgClass' => 'label-success',
                        'active' => (Yii::$app->controller->id == 'timeline-event') ,
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('backend', 'System Information'),
                        'url' => ['/system/information/index'],
                        'icon' => '<i class="fa fa-dashboard"></i>',
                        'active' => (Yii::$app->controller->id == 'information') ,
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('backend', 'Cache'),
                        'url' => ['/system/cache/index'],
                        'icon' => '<i class="fa fa-refresh"></i>',
                        'active' => (Yii::$app->controller->id == 'cache') ,
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('modulemanager', 'Modules manager'),
                        'url' => ['/modulemanager/default/index'],
                        'icon' => '<i class="fa fa-refresh"></i>',
                        'active' => (Yii::$app->controller->id == 'default') ,
                        'visible' => Yii::$app->user->can('modulemanager-module'),
                    ],
                    [
                        'label' => Yii::t('backend', 'Logs'),
                        'url' => ['/system/log/index'],
                        'icon' => '<i class="fa fa-warning"></i>',
                        'badge' => SystemLog::find()->count(),
                        'badgeBgClass' => 'label-danger',
                        'active' => (Yii::$app->controller->id == 'log') ,
                        'visible' => Yii::$app->user->can('administrator'),
                    ],

                ],
            ];

    }

}
