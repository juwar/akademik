<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Kecakapan $model */

$this->title = $model->id_kecakapan;
$this->params['breadcrumbs'][] = ['label' => 'Kecakapans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kecakapan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_kecakapan' => $model->id_kecakapan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_kecakapan' => $model->id_kecakapan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kecakapan',
            'kode_matkul',
            'type_kecakapan',
        ],
    ]) ?>

</div>
