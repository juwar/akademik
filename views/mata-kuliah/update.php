<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MataKuliah $model */

$this->title = 'Update Mata Kuliah: ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'kode' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';

$form = ActiveForm::begin([
    'id' => 'mata-kuliah-update-form',
    'options' => ['class' => 'form-horizontal'],
]);
?>
<div class="mata-kuliah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode')->textInput(['disabled' => true]) ?>
    <?= $form->field($model, 'nama') ?>
    <?= $form->field($model, 'sks') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>