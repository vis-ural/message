<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * ContactForm is the model behind the contact form.
 */
class LoadfileForm extends Model
{

    public $attachments;
    public $gr;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['attachments','gr' ], 'string'],


        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'attachments' => Yii::t('frontend', 'Имя'),

        ];
    }


}
