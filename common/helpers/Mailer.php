<?php
namespace common\helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use common\models\MailFile;
use Yii;

/*
 * In-app wrapper for PHPMailer
 */
class Mailer
{
    protected $mail;
    protected $name;
    protected $from;


    public function __construct()
    {
        $this->mail = new PHPMailer();

        $this->mail->XMailer = null;
        $this->mail->CharSet = 'UTF-8';
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isHTML(true);
    }


    public function send($to, $subject, $body): bool
    {
        $this->mail->AddAddress($to);
        $this->mail->SetFrom($this->getFrom(), $this->getName());
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        if ($this->mail->Send())
        {
            MailFile::createOutbound($this->getFrom(), $to, $subject, $body);
            return true;
        }

        return false;
    }


    public function setAttachments($attachments): void
    {
        foreach ($attachments as $file)
        {
            $this->mail->AddAttachment($file->tempName, $file->name);
        }
    }


    public function setFrom(string $from): void
    {
        $this->from = $from;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    protected function getFrom(): string
    {
        return $this->from ?? Yii::$app->params['noreplyEmail'];
    }


    protected function getName(): string
    {
        return $this->name ?? Yii::$app->params['app.name'];
    }

}