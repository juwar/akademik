<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MataKuliah;
use app\models\Mahasiswa;


/** @var yii\web\View $this */
/** @var app\models\Nilai $model */

$this->title = 'Create Nilai';
$this->params['breadcrumbs'][] = ['label' => 'Nilais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$dataList = ArrayHelper::map(MataKuliah::find()->asArray()->all(), 'kode', 'nama');
$dataListNim = ArrayHelper::map(Mahasiswa::find()->asArray()->all(), 'nim', 'nama');
?>
<div class="nilai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->dropDownList(
        $dataListNim,
        ['prompt' => '- Nama -']
    )->label('Nama') ?>
    <?= $form->field($model, 'kode_matkul')->dropDownList(
        $dataList,
        ['prompt' => '- Mata Kuliah -']
    )->label('Mata Kuliah') ?>
    <?= $form->field($model, 'semester') ?>
    <?= $form->field($model, 'nilai') ?>
    <?= $form->field($model, 'bobot_nilai') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
