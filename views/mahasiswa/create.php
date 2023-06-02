<?php

use app\models\Dosen;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Mahasiswa $model */

$this->title = 'Create Mahasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'id' => 'mahasiswa-create-form',
    'options' => ['class' => 'form-horizontal'],
]);
$dataList = ArrayHelper::map(Dosen::find()->asArray()->all(), 'nip', 'nama');
?>
<div class="mahasiswa-create">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama') ?>
    <?= $form->field($model, 'prodi') ?>
    <!-- <?= $form->field($model, 'id_dosen') ?> -->
    <?= $form->field($model, 'id_dosen')->dropDownList(
        $dataList,
        ['prompt' => '- Pembimbing -']
    ) ?>
    <?= $form->field($model, 'telpon') ?>
    <?= $form->field($model, 'alamat') ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>