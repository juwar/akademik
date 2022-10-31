<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Mahasiswa $model */

$this->title = 'Update Mahasiswa: ' . $model->nim;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nim, 'url' => ['view', 'nim' => $model->nim]];
$this->params['breadcrumbs'][] = 'Update';

$form = ActiveForm::begin([
    'id' => 'mahasiswa-update-form',
    'options' => ['class' => 'form-horizontal'],
]);
?>
<div class="mahasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['disabled' => true]) ?>
    <?= $form->field($model, 'nama') ?>
    <?= $form->field($model, 'prodi') ?>
    <?= $form->field($model, 'pembimbing') ?>
    <?= $form->field($model, 'telpon') ?>
    <?= $form->field($model, 'alamat') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>