<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ConsultForm extends Model
{
    public $name;
    public $body;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'body', 'phone'], 'required'],
        ];
    }

    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo('info@icrypto.world')
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject($this->name . ' ' . $this->phone . ' asks for consult')
            ->setTextBody($this->body)
            ->send();
    }
}
