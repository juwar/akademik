<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MataKuliah;
use app\models\Mahasiswa;

/** @var yii\web\View $this */
/** @var app\models\Nilai $model */

$this->title = 'Update Nilai: ' . $model->id_nilai;
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nilai, 'url' => ['view', 'id_nilai' => $model->id_nilai]];
$this->params['breadcrumbs'][] = 'Update';

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$dataList=ArrayHelper::map(MataKuliah::find()->asArray()->all(), 'kode', 'nama');
$dataListNim=ArrayHelper::map(Mahasiswa::find()->asArray()->all(), 'nim', 'nim');
?>
<div class="nilai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nim')->dropDownList($dataListNim, 
            ['prompt'=>'- NIM -']) ?>
        <?= $form->field($model, 'kode_matkul')->dropDownList($dataList, 
            ['prompt'=>'- Mata Kuliah -']) ?>
        <?= $form->field($model, 'semester') ?>
        <?= $form->field($model, 'nilai') ?>
        <?= $form->field($model, 'bobot_nilai') ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
