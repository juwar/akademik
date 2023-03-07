<?php

use app\models\MataKuliah;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MataKuliahSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Mata Kuliahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mata Kuliah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kode',
            'nama',
            'sks',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, MataKuliah $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'kode' => $model->kode]);
                 },
                'template' => $actionButton,
            ],
        ],
    ]); ?>


</div>
