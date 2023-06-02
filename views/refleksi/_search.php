<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RefleksiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="refleksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_refleksi') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'refleksi_pembimbing') ?>

    <?= $form->field($model, 'kelemahan') ?>

    <?= $form->field($model, 'kekurangan') ?>

    <?php // echo $form->field($model, 'pencapaian_akademik') ?>

    <?php // echo $form->field($model, 'pencapaian_non_akademik') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
