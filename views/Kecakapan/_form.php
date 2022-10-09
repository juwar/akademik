<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Kecakapan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kecakapan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kecakapan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_matkul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_kecakapan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
