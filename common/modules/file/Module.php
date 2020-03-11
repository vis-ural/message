<?php

namespace common\modules\file;
use Yii;
/**
 * file module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\file\controllers';

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
                'label' => Yii::t('back', 'Files'),
                'url' => '#',
                'icon' => '<i class="fa fa-file-photo-o"></i>',
                'options' => ['class' => 'treeview'],
                'active' => (Yii::$app->controller->module->id == 'file'),
                'visible' => Yii::$app->user->can('file-module'),
                'items' => [
                    [
                        'label' => Yii::t('backend', 'File Storage'),
                        'url' => ['/file/storage/index'],
                        'icon' => '<i class="fa fa-database"></i>',
                        'active' => (Yii::$app->controller->id == 'storage'),
                    ],
                    [
                        'label' => Yii::t('backend', 'File Manager'),
                        'url' => ['/file/manager/index'],
                        'icon' => '<i class="fa fa-television"></i>',
                        'active' => (Yii::$app->controller->id == 'manager'),
                    ],

                ],
            ];

    }

}
