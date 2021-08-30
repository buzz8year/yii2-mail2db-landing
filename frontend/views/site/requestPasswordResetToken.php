<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Password Reset Request');
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.site-login {
    width: 90%;
    max-width: 400px;
    float: none;
    margin: auto;
}
</style>



<div class="site-login">
    <div class="row">
        <div class="login-form text-center">
            <h3><?= Html::encode($this->title) ?></h3><br/>
            <p><?= Yii::t('app', 'Enter your email to request your password reset.') ?></p>

            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput([
                        'class' => 'form-control input-lg text-center', 
                        'placeholder' => Yii::t('app', 'Email Address'), 
                        'autofocus' => true
                    ])->label(false) ?>

                <br/>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Retrieve Instructions'), ['class' => 'btn btn-primary btn-lg', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>



        </div>
    </div>

</div>
