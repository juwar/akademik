<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Refleksi $model */

$this->title = 'Create Refleksi';
$this->params['breadcrumbs'][] = ['label' => 'Refleksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refleksi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
