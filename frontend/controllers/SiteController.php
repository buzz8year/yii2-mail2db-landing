<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\ConsultForm;
use frontend\models\PartnerForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'form-consult' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action) 
    {
        Yii::$app->language = Yii::$app->session->get('language') ?? 'en-US';

        return parent::beforeAction($action);
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionChangeLanguage(string $to = '')
    {
        if ($to) Yii::$app->session->set('language', $to);

        Yii::$app->language = Yii::$app->session->get('language');

        return Yii::$app->language;
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }



    public function actionFormConsult()
    {
        // if (Yii::$app->request->isAjax)
        //     return 99999;

        $model = new ConsultForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if ($model->sendEmail(Yii::$app->params['adminEmail']))
                return json_encode('Thank you for contacting us. We will respond to you as soon as possible.');
            
            else return json_encode('There was an error sending your message.');
        } 
        
        // else return null;
        // else return json_encode($model->errors);
        return json_encode(Yii::$app->request->post());
    }



    public function actionFormPartner()
    {
        $model = new PartnerForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if ($model->sendEmail(Yii::$app->params['adminEmail']))
                return json_encode('Thank you for contacting us. We will respond to you as soon as possible.');
            
            else return json_encode('There was an error sending your message.');
        } 
        
        // else return null;
        else return json_encode(Yii::$app->request->post());
        // else return json_encode($model->errors);
    }



    /**
     * Signs user up.
     *
     * @return mixed
     */
//     public function actionSignup()
//     {
//         $model = new SignupForm();
//         if ($model->load(Yii::$app->request->post()) && $model->signup()) {
//             Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
//             return $this->goHome();
//         }
//
//         return $this->render('signup', [
//             'model' => $model,
//         ]);
//     }



    public function actionResetPassword($token)
    {
        try 
        {
            $model = new ResetPasswordForm($token);
        } 
        catch (InvalidParamException $e) 
        {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) 
        {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Saved successfully. You can now sign in using your new password.'));

            return $this->redirect(['/login']);
            // return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }




        /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            if ($model->sendEmail()) 
            {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Request accepted. We\'ve sent you an email with further instructions - check your inbox.'));
                // return $this->goHome();
            } 
            else 
            {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to reset password for the provided email address.'));
            }

            return $this->refresh();
        }

        // return $this->refresh();
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }



}
