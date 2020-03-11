<?php

namespace common\modules\translation;
use Yii;
/**
 * translation module definition class
 */
class Module extends \yii\base\Module
{
    /** @inheritdoc */
    public $controllerNamespace = 'common\modules\translation\controllers';

    /**
     * @param \yii\i18n\MissingTranslationEvent $event
     */
    public static function missingTranslation($event)
    {
        // do something with missing translation
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
                'label' => Yii::t('backend', 'Translations'),
                'url' => '#',
                'icon' => '<i class="fa fa-language"></i>',
                'options' => ['class' => 'treeview'],
                'active' => (Yii::$app->controller->module->id == 'translation'),
                'visible' => Yii::$app->user->can('translation-module'),
                'items' => [
                    [
                        'label' => Yii::t('backend', 'Translation'),
                        'url' => ['/translation/default/index'],
                        'icon' => '<i class="fa fa-language"></i>',
                        'active' => (Yii::$app->controller->id == 'default'),
                    ],
                ],
            ];

    }

}
