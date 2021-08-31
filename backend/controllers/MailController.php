<?php
namespace backend\controllers;

use backend\models\search\MailSearch;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\MailForm;
use common\models\MailFile;
use common\models\User;
use Exception;

use yii\web\UploadedFile;
use ZBateson\MailMimeParser\Message;


class MailController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $model = new MailForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $model->attachments = UploadedFile::getInstances($model, 'attachments');

            if ($model->sendManyByPhpmailer())
                Yii::$app->session->setFlash('success', 'Message has been sent to recipients!');

            else Yii::$app->session->setFlash('error', 'There was an error sending your message.');

            return $this->refresh();
        } 
        else 
        {
            $users = User::find()->all();

            return $this->render('index', [
                'model' => $model,
                'users' => $users,
                'data' => [],
            ]);
        }

    }


    public function actionInbox()
    {
        $dir = 'mail/';
        $list = array_diff(scandir($dir), array('..', '.'));

        foreach ($list as $key => $filename) {
            MailFile::createFromFile($filename);
        }

        $search = new MailSearch();
        $search->type = MailFile::TYPE_INCOMING;
        $dataProvider = $search->search(Yii::$app->request->queryParams);

        return $this->render('inbox', [
            'dataProvider' => $dataProvider,
            //'list' => $list,
            //'dir' => $dir,
        ]);
    }


    public function actionOutbox()
    {
        $search = new MailSearch();
        $search->type = MailFile::TYPE_OUTBOUND;
        $dataProvider = $search->search(Yii::$app->request->queryParams);

        return $this->render('outbox', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView(int $id)
    {
        $this->layout = false;

        $mail = MailFile::find()->where(['id' => $id])->one();
        $mail->status = MailFile::STATUS_READ;
        $mail->save();

        $atts = [];

        try {
            $contents = file_get_contents('mail/' . $mail->filename);
            $message = Message::from($contents);
            $html = $message->getHtmlContent() ?? $message->getTextContent();
            $atts = $message->getAllAttachmentParts();
        } catch (Exception $e) {
            $html = $mail->content_text;
        }

        return $this->render('view', [
            'html' => $html,
            'attachments' => $atts,
        ]);
    }


}