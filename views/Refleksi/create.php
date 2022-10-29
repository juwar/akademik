<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Kecakapan;
use app\models\Mahasiswa;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */

$this->title = 'Create Refleksi';
$this->params['breadcrumbs'][] = ['label' => 'Refleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$dataListKecakapan=ArrayHelper::map(Kecakapan::find()->asArray()->all(), 'id_kecakapan', 'type_kecakapan');
$dataListMahasiswa=ArrayHelper::map(Mahasiswa::find()->asArray()->all(), 'nim', 'nama');
?>
<div class="refleksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nim')->dropDownList($dataListMahasiswa, 
            ['prompt'=>'- Nama -']) ?>
        <?= $form->field($model, 'id_kecakapan')->dropDownList($dataListKecakapan, 
            ['prompt'=>'- Kecakapan -']) ?>
        <?= $form->field($model, 'refleksi_pembimbing') ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
