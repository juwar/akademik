<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MataKuliah;

/** @var yii\web\View $this */
/** @var app\models\Kecakapan $model */

$this->title = 'Create Kecakapan';
$this->params['breadcrumbs'][] = ['label' => 'Kecakapans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$dataList=ArrayHelper::map(MataKuliah::find()->asArray()->all(), 'kode', 'nama');
?>
<div class="kecakapan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_kecakapan') ?>
        <?= $form->field($model, 'kode_matkul')->dropDownList($dataList, 
            ['prompt'=>'- Mata Kuliah -']) ?>
        <?= $form->field($model, 'type_kecakapan') ?>


        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
