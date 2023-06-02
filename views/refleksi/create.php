<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mahasiswa;
use Yii;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */

$this->title = 'Create Refleksi';
$this->params['breadcrumbs'][] = ['label' => 'Refleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);
$identity = Yii::$app->user->identity;
$dataListMahasiswa = ArrayHelper::map(Mahasiswa::find()->where('id_dosen=:id_dosen', array(':id_dosen' => $identity->id))->asArray()->all(), 'nim', 'nama');

?>
<div class="refleksi-create">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?php $form = ActiveForm::begin(); ?>
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