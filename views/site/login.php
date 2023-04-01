<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::img('@web/assets/img/pti.png', ['alt' => 'My logo', 'width' => '100%']) ?>
<div><br>
    <center>
        <h3>
            <font color=#008B8B>
                <p>
                    PTI AKADEMIK portal layanan akademik Pendidikan Teknik Informatika
                </p>
            </font>
        </h3>
    </center>
</div>
<div class="site-login ">

    <div class="mx-auto" style="width:50%;">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
        ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>
        <div class="form-group">
            <div class="offset-lg-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

    <div class="offset-lg-1" style="color:#999;">
        <!-- You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br> -->
        <!-- To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->

    </div>
</div>
<br><br><br><br><br><br><br><br>
<?= Html::img('@web/assets/img/fo.png', ['alt' => 'My logo', 'width' => '100%']) ?>