<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="refleksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_refleksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refleksi_pembimbing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelemahan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kekurangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pencapaian_akademik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pencapaian_non_akademik')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
