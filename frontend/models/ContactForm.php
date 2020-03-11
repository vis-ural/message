<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $tel;
    public $subject;
    public $body;
    public $verifyCode;
    public $source_form;
    public $phone;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name',   'subject','verifyCode', 'body', 'tel'], 'string'],
            // We need to sanitize them
            [['name', 'subject', 'body'], 'filter', 'filter' => 'strip_tags'],
            // email has to be a valid email address
            [['phone','name'], 'required'],

            [['tel'], 'string'],
            [['phone'], PhoneInputValidator::className()],

            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('frontend', 'Имя'),
            'phone' => Yii::t('frontend', 'Телефон'),
            'email' => Yii::t('frontend', 'Email'),
            'subject' => Yii::t('frontend', 'Тема'),
            'body' => Yii::t('frontend', 'Описание'),
            'verifyCode' => Yii::t('frontend', 'Проверочный код')
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            return Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom(Yii::$app->params['robotEmail'])
                ->setReplyTo([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();
        } else {
            return false;
        }
    }
}
