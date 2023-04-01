<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Nilai $model */

$this->title = $model->id_nilai;
$this->params['breadcrumbs'][] = ['label' => 'Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="nilai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_nilai' => $model->id_nilai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_nilai' => $model->id_nilai], [
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
            'id_nilai',
            'nim',
            'kode_matkul',
            'semester',
            'nilai',
            'bobot_nilai',
        ],
    ]) ?>

</div>
