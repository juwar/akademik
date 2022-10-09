<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MataKuliah $model */

$this->title = 'Create Mata Kuliah';
$this->params['breadcrumbs'][] = ['label' => 'Mata Kuliahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-kuliah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
