<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NilaiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nilai-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_nilai') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'kode_matkul') ?>

    <?= $form->field($model, 'semester') ?>

    <?= $form->field($model, 'nilai') ?>

    <?php // echo $form->field($model, 'bobot_nilai') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
