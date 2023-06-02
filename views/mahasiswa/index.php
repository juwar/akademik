<?php

use app\models\Mahasiswa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\MahasiswaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Mahasiswa';
$this->params['breadcrumbs'][] = $this->title;
$role = Yii::$app->user->identity ? Yii::$app->user->identity->role : 0;
$accessRules = $role === User::ROLE_ADMIN;
?>
<div class="mahasiswa-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= $accessRules ? Html::a('Create Mahasiswa', ['create'], ['class' => 'btn btn-success']) : null ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nim',
            'nama',
            'prodi',
            [
                'label' => 'Pembimbing',
                'attribute' => 'dosen',
            ],
            'telpon',
            'alamat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Mahasiswa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'nim' => $model->nim]);
                },
                'template' => $accessRules ? '{view} {update} {delete}' : '{view}',
            ],
        ],
    ]); ?>


</div>