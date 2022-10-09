<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="refleksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_refleksi')->textInput() ?>

    <?= $form->field($model, 'id_nilai')->textInput() ?>

    <?= $form->field($model, 'id_kecakapan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refleksi_pembimbing')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
