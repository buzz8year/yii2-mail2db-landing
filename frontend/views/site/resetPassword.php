<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Reset password');
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

<div class="site-login text-center">


    <div class="row">
        <div class="login-form">
            <h3><?= Html::encode($this->title) ?></h3><br/>
            <p>Please choose your new password</p>


            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'placeholder' => 'New Password', 'class' => 'form-control input-lg text-center'])->label(false) ?>

            <?= $form->field($model, 'password_repeat')->passwordInput(['autofocus' => true, 'placeholder' => 'Repeat Password', 'class' => 'form-control input-lg text-center'])->label(false) ?><br/>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
            </div><br/>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
