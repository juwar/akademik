<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\User;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
$role = Yii::$app->user->identity ? Yii::$app->user->identity->role : 0;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    // var_dump(User::ROLE_ADMIN);die;
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR || $role === User::ROLE_USER,],
            ['label' => 'Mahasiswa', 'url' => ['/mahasiswa/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR,],
            ['label' => 'Mata Kuliah', 'url' => ['/mata-kuliah/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR || $role === User::ROLE_USER,],
            ['label' => 'Kecakapan', 'url' => ['/kecakapan/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR ,],
            ['label' => 'Kecakapan Siswa', 'url' => ['/kecakapan-siswa/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR || $role === User::ROLE_USER, ],
            ['label' => 'Nilai', 'url' => ['/nilai/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR || $role === User::ROLE_USER,],
            ['label' => 'Refleksi', 'url' => ['/refleksi/index'], 'visible' => $role === User::ROLE_ADMIN || $role === User::ROLE_MODERATOR || $role === User::ROLE_USER,],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'  
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
