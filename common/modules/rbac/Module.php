<?php

namespace common\modules\rbac;
use Yii;
/**
 * rbac-crud module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\rbac\controllers';

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
                'label' => Yii::t('backend', 'Управление правами'),
                'icon' => '<i class="fa fa-angle-double-right"></i>',
                'options' => ['class' => 'treeview'],
                'url' => '#',
                // 'visible' =>  Yii::$app->user->can('ben-bot'),
                'badge' => 2,
                'badgeBgClass' => 'label-success',
                'items' => [
                    [
                        'label' => Yii::t('backend', 'Права'),

                        'url' => ['/rbac'],
                        // 'visible' =>  Yii::$app->user->can('ben-bot'),
                        'badge' => 0,
                        'badgeBgClass' => 'label-success',
                    ],


                ]

            ];

    }

}
