<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class PartnerForm extends Model
{
    public $name;
    public $phone;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
        ];
    }

    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo('dam@icrypto.world')
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setSubject('Partnership Query')
            ->setTextBody($this->name . ' ' . $this->phone . ' asks for partnership')
            ->send();
    }
}