<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */

$this->title = 'Update Refleksi: ' . $model->id_refleksi;
$this->params['breadcrumbs'][] = ['label' => 'Refleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_refleksi, 'url' => ['view', 'id_refleksi' => $model->id_refleksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refleksi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
