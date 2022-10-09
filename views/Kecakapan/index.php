<?php

use app\models\Kecakapan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KecakapanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kecakapans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kecakapan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kecakapan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kecakapan',
            'matkul',
            'type_kecakapan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Kecakapan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_kecakapan' => $model->id_kecakapan]);
                 }
            ],
        ],
    ]); ?>


</div>
