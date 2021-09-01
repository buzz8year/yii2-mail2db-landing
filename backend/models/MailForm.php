<?php

namespace backend\models;

use Yii;
use Exception;
use yii\base\Model;
use yii\validators\EmailValidator;

/**
 * ContactForm is the model behind the contact form.
 */
class MailForm extends Model
{
    public $name;
    // public $email;

    public $to;
    public $from;
    public $subject;
    public $body;
    public $attachments;

    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['name', 'email', 'to', 'subject', 'body'], 'required'],
            [['attachments'], 'file', 'extensions' => 'png, jpg, pdf', 'maxFiles' => 10, 'maxSize' => 1024 * 1024 * 36],
            [['from', 'to', 'subject', 'body'], 'required'],
            ['to', 'checkEmailList'],
            // ['verifyCode', 'captcha'],
            // ['email', 'email'],
        ];
    }

    public function checkEmailList($attribute) {

        $validator = new EmailValidator;

        $emails = is_array($this->to) ? : explode(', ', $this->to);

        foreach ($emails as $email)
        {
            $validator->validate($email) ? : $this->addError($attribute, "{email} is not a valid email.");
        }

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Captcha Code',
        ];
    }


    /**
     * Sends an email to the specified email addresses using the information collected by this model.
     *
     * @return bool whether the email was sent
     */
    public function sendManyByPhpmailer(): bool
    {
        // EXPLAIN: ...
        $emails = is_array($this->to) ? : explode(', ', $this->to);

        // try
        // {
            $mailer = new Mailer();
            $mailer->setFrom($this->from);
            $mailer->setAttachments($this->attachments);

            foreach ($emails as $to)
                $mailer->send($to, $this->subject, $this->body);
        // }
        // catch (Exception $e)
        // {
        //     Yii::$app->session->setFlash('info', json_encode($e));
        //     return false;
        // }

        return true;
    }


}
