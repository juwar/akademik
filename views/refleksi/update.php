<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mahasiswa;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */

$this->title = 'Update Refleksi: ' . $model->id_refleksi;
$this->params['breadcrumbs'][] = ['label' => 'Refleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_refleksi, 'url' => ['view', 'id_refleksi' => $model->id_refleksi]];
$this->params['breadcrumbs'][] = 'Update';

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$dataListMahasiswa = ArrayHelper::map(Mahasiswa::find()->where('id_dosen=:id_dosen', array(':id_dosen' => $identity->id))->asArray()->all(), 'nim', 'nama');

?>
<div class="refleksi-update">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_refleksi')->textInput(['disabled' => true]) ?>
    <?= $form->field($model, 'nim')->dropDownList(
        $dataListMahasiswa,
        ['prompt' => '- Nama -', 'label' => 'Nama']
    )->label('Nama') ?>
    <?= $form->field($model, 'refleksi_pembimbing') ?>
    <?= $form->field($model, 'kelemahan') ?>
    <?= $form->field($model, 'kekurangan') ?>
    <?= $form->field($model, 'pencapaian_akademik') ?>
    <?= $form->field($model, 'pencapaian_non_akademik') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>