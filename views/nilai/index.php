<?php

use app\models\Nilai;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NilaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nilais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Nilai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_nilai',
            'username',
            'matkul',
            'semester',
            'nilai',
            //'bobot_nilai',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Nilai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_nilai' => $model->id_nilai]);
                 },
                 'template' => $actionButton,
            ],
        ],
    ]); ?>


</div>
