<?php

namespace common\models;

//use Yii;
use yii\db\ActiveRecord;
use ZBateson\MailMimeParser\Message;
use ZBateson\MailMimeParser\Header\HeaderConsts;

/**
 * This is the model class for table "mail_file".
 *
 * @property int $id
 * @property int $filename
 * @property string $pathname
 * @property int $epoch_received
 * @property int $epoch_recorded
 * @property string $address_from
 * @property string $address_to
 * @property string $subject
 * @property string $attachments
 * @property string $content_text
 * @property string $content_html
 * @property int $status
 */
class MailFile extends ActiveRecord
{
    const TYPE_INCOMING = 1;
    const TYPE_OUTBOUND = 2;

    const STATUS_READ = 2;
    const STATUS_NEW = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'epoch_recorded', 'address_from', 'address_to'], 'required'],
            [['epoch_received', 'epoch_recorded', 'status'], 'integer'],
            [['content_original', 'content_text', 'content_html'], 'string'],
            [['filename', 'pathname', 'address_from', 'address_to'], 'string', 'max' => 64],
            [['subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'pathname' => 'Pathname',
            'epoch_received' => 'Epoch Received',
            'epoch_recorded' => 'Epoch Recorded',
            'address_from' => 'Address From',
            'address_to' => 'Address To',
            'subject' => 'Subject',
            'content_original' => 'Content Original',
            'content_text' => 'Content Text',
            'content_html' => 'Content Html',
            'status' => 'Status',
        ];
    }


    public static function createFromFile(string $filename)
    {
        $isDuplicate = self::find()->where(['filename' => $filename])->scalar();

        if (!$isDuplicate) 
        {
            $contents = file_get_contents('mail/' . $filename);

            $message = Message::from($contents);

            $new = new self();

            $new->pathname = null;
            $new->filename = $filename;
            $new->epoch_recorded = time();
            $new->epoch_received = strtotime($message->getHeaderValue(HeaderConsts::DATE));
            $new->address_from = $message->getHeaderValue(HeaderConsts::FROM);
            $new->address_to = $message->getHeaderValue(HeaderConsts::TO);
            $new->subject = $message->getHeaderValue(HeaderConsts::SUBJECT);
            // $new->content_original = $contents;
            // $new->content_html = $message->getHtmlContent();
            $new->content_text = $message->getTextContent();
            $new->type = self::TYPE_INCOMING;
            $new->status = self::STATUS_NEW;

            $new->save();

            //Yii::$app->session->setFlash('danger', json_encode($new->errors));
        }
    }


    public static function createOutbound(string $from, string $to, string $subject, string $body) : void
    {
        $new = new self();

        $new->pathname = null;
        $new->filename = 'outbound';
        $new->epoch_recorded = time();
        $new->epoch_received = null;
        $new->address_from = $from;
        $new->address_to = $to;
        $new->subject = $subject;
        $new->content_text = $body;
        $new->type = self::TYPE_OUTBOUND;
        $new->status = self::STATUS_READ;

        $new->save();

        //Yii::$app->session->setFlash('danger', json_encode($new->errors));
    }
}
