<?php

use app\models\Refleksi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RefleksiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Refleksis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refleksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Refleksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_refleksi',
            'id_nilai',
            'id_kecakapan',
            'refleksi_pembimbing',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Refleksi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_refleksi' => $model->id_refleksi]);
                 }
            ],
        ],
    ]); ?>


</div>
