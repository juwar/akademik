<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\MataKuliah;
use app\models\Mahasiswa;
use unclead\multipleinput\MultipleInput;


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

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->dropDownList(
        $dataListNim,
        ['prompt' => '- Nama -']
    )->label('Nama') ?>
    <?= $form->field($model, 'semester') ?>
    <?= $form->field($model, 'nilai')->widget(MultipleInput::className(), [
        'min' => 1,
        'max' => 4,
        'allowEmptyList' => false,
        'enableGuessTitle' => true,
        'addButtonPosition' => MultipleInput::POS_HEADER,
        'addButtonOptions' => [
            'class' => 'btn btn-success',
            'label' => 'Add' // also you can use html code
        ],
        'removeButtonOptions' => [
            'label' => 'Remove'
        ],
        'columns' => [
            [
                'name' => 'matkul',
                'title' => 'Mata Kuliah',
                'type' => 'dropDownList',
                'items' => $dataList,
            ],
            [
                'name' => 'nilai',
                'title' => 'Nilai (A, B, C, D, E)',
                'type' => 'textInput',
            ],
        ]
    ])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary mt-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>