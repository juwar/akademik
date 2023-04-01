<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\MataKuliah $model */

$this->title = 'Create Mata Kuliah';
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'mata-kuliah-create-form',
    'options' => ['class' => 'form-horizontal'],
]);
?>
<div class="mata-kuliah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama') ?>
    <?= $form->field($model, 'sks') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>