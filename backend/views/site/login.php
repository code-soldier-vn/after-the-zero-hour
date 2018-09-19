<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-user">
    <div class="image">
        <img src=" /img/bg-login.jpeg">
    </div>
    <div class="content">
        <div class="author">
            <img class="avatar border-white" src="/img/ava.jpg" alt="...">
            <h4 class="title"><?= Html::encode($this->title) ?></h4>
        </div>
        <p class="description text-center">
            The quieter you become, <br/>the more you are able to hear…
        </p>
    </div>
    <hr>
    <div id="box_login">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
