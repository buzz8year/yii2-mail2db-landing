<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('frontend', 'Password Reset Request');
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.navbar-brand {
    color: #fff!important;
}
.footer {
    /*color: #fff;*/
    text-align: center;
    color: rgba(250,250,250,.15);
    /*font-weight: 600!important;*/
    /*font-family: 'montserrat';*/
}
.form-control {
    box-shadow: none!important;
    border-radius: 0;
    /*padding: 28px 20px 28px 55px;*/
    padding: 14px 20px 14px 55px;
    height: 57px;
    /*text-align: center;*/
    transition: .2s!important;
}
.form-control:focus, .form-control:focus + .help-block {
    /*border-color: #4ae!important;*/
}
.has-error .form-control {
    border-color: #ddaaaa;
    /*border-bottom-color: #fff;*/
}
.has-error .form-control:focus {
    border-color: #ddaaaa;
}
.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
    color: #bb0000;
    background-color: #ddbbbb;
    text-align: left;
    font-size: 14px;
    border: 1px solid #ddaaaa;
    border-top: none;
}
.help-block {
    margin: 0;
    z-index: 2;
    transition: .2s!important;
    padding-left: 18px;
}
.field-loginform-recaptcha .help-block {
    margin: 0 -1px;
}
.site-login:before {
    /*transform: rotateX(180deg);*/
    /*filter: grayscale(0) blur(0);*/
    /*background-image: url(img/blurcity.jpg);*/
    /*filter: blur(10px);*/
    /*filter: hue-rotate(0deg) saturate(1) brightness(1.5);*/
}
.site-login:after {
    /*background: linear-gradient(60deg, rgba(30,30,36,.9), rgba(36,38,46,.9) 60%, rgba(36,40,50,.9));*/
    /*box-shadow: inset 0 0 30px #000;*/
    /*background: linear-gradient(60deg, rgba(30,30,30,.9), rgba(36,38,38,.9) 60%, rgba(36,40,40,.9));*/
}
.navbar-brand {
    top: 7.5vh!important;
}
.login-form {
    /*background-color: rgba(255,255,255,.95);*/
    position: relative;
    display: inline-block;
}
.form-envelope {
    position: absolute;
    left: 65px;
    margin-top: 15px;
    font-size: 24px;
    color: #338cd8;
}
.form-lock, .form-unlock {
    position: absolute;
    left: 70px;
    margin-top: 16px;
    font-size: 26px;
    color: #338cd8;
}
.btn {
    padding: 12px 0;
}
.navbar-toggle {
    display: none!important;
}
.alert {
    margin: 8vh 0 -2vh;
    text-align: center;
    color: #fff!important;
    border-color: #fff!important;
    background: none;
}
a {
    font-weight: 400;
}

.lang-noauth {
    position: absolute; 
    transition: .3s;
    opacity: .3; 
    z-index: 10;
    right: 0;
    top: 37px; 
}
.lang-noauth:hover {
    opacity: 1; 
}
.lang-noauth .navbar-lang {
    position: relative; 
    /*left: 5px; */
    cursor: pointer; 
    opacity: 1;
}
.navbar-lang-wrap {
    left: auto;
    right: 0;
}

h3 {
    line-height: 36px;
    font-weight: 100;
    font-size: 21px;
}

@media (max-width: 768px) {
    .navbar-lang-wrap {
        margin: -15px 30% 0;
        right: auto;
        left: 0;
    }
    .navbar-brand {
        color: #09e!important;
        font-weight: 600!important;
    }
    .navbar-brand i {
        background-color: #09e;
    }
    .login-form {
        background: transparent;
        margin-top: 15px!important;
        box-shadow: none;
    }
    .login-form h3 {
        display: none;
    }
    .footer {
        display: none;
    }
    .form-envelope {
        left: 35px;
    }
    .form-lock, .form-unlock {
        left: 40px;
    }
    .form-control {
        padding: 14px 20px;
        text-align: center;
    }
    .alert {
        color: #08e!important; 
        border-color: #09f!important; 
        background-color: transparent!important; 
    }
    .text-left {
        text-align: center;
    }
}
</style>



<div class="site-login">
    <div class="row">
        <div class="login-form text-center">
            <h3 class="text-left"><?= Html::encode($this->title) ?></h3><br/>
            <p class="text-left"><?= Yii::t('frontend', 'Enter your email to request your password reset.') ?></p>

            <div class="lang-noauth">
                <span class="navbar-lang-wrap">
                    <span class="navbar-lang-open"><i class="fa fa-globe"></i> &nbsp;<?php echo strtoupper(explode('-', Yii::$app->language)[0]); ?></span>
                    <span class="navbar-lang" data-lang="en-US">English</span>
                    <span class="navbar-lang" data-lang="mn-MN">Mongolian</span>
                    <span class="navbar-lang" data-lang="de-DE">German</span>
                    <span class="navbar-lang" data-lang="zh-CN">Chinese</span>
                    <span class="navbar-lang" data-lang="ru-RU">Russian</span>
                </span>
            </div><br/>


            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <i class="fa fa-envelope form-envelope"></i>
                <?= $form->field($model, 'email')->textInput([
                        'class' => 'form-control input-lg', 
                        'placeholder' => Yii::t('frontend', 'Email Address'), 
                        'autofocus' => true
                    ])->label(false) ?>

                <br/>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('frontend', 'Retrieve Instructions'), ['class' => 'btn btn-primary btn-lg', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>



        </div>
    </div>

</div>
