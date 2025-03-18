<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/images/logo/logo.png')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo/logo.png', ['alt' => 'SInformasiK', 'class' => 'd-inline-block align-text-top', 'style' => 'height: 35px;']) . 'SInformasiK',
        'brandUrl' => 'javascript:void(0);', // Prevent navigation when clicked
        'brandOptions' => ['class' => 'navbar-brand d-flex align-items-center'],
        'options' => [
            'class' => 'navbar-expand-md navbar-dark',
            'style' => 'background-color: #001f3f; color: white;', // Blue dark background with white text
        ],
    ]);
    
    // Periksa role pengguna yang sedang login
    $role = !Yii::$app->user->isGuest ? Yii::$app->user->identity->role : null;
    
    $menuItems = [];
    
    // Navbar khusus untuk master
    if ($role === 'master') {
        $menuItems = [
            ['label' => 'Dashboard', 'url' => ['master/index']],
            ['label' => 'Manage News', 'url' => ['//news/index']],
            ['label' => 'Manage Users', 'url' => ['//user/index']],
            ['label' => 'Reports', 'url' => ['master/reports']],
        ];
    }
    // Navbar untuk role lain atau default
    elseif ($role === 'employee') {
        $menuItems = [
            ['label' => 'Dashboard', 'url' => ['employee/index']],
            ['label' => 'Process Patient', 'url' => ['//user/index']],
            ['label' => 'Tasks', 'url' => ['employee/tasks']],
        ];
    } elseif ($role === 'user') {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Patient Care', 'url' => ['//user/_form']],
        
        ];
    } else {
        // Navbar untuk pengguna yang belum login
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            [
                'label' => '<i class="bi bi-person"></i>', // Bootstrap icon
                'url' => '#',
                'encode' => false, // Allow rendering of HTML in the label
                'linkOptions' => [
                    'class' => 'dropdown-toggle',
                    'data-bs-toggle' => 'dropdown', // Bootstrap dropdown toggle
                    'aria-expanded' => 'false',
                ],
                'items' => [
                    ['label' => 'Login', 'url' => ['/site/login']],
                    ['label' => 'Register', 'url' => ['/site/register']],
                ],
            ],
        ];
    }
    
    // Tambahkan tombol logout untuk pengguna login
    if (!Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => '<i class="bi bi-person"></i> ' . Yii::$app->user->identity->username,
            'encode' => false, // Allow rendering of HTML in the label
            'items' => [
            [
                'label' => 'Logout',
                'url' => ['/site/logout'],
                'linkOptions' => [
                    'data-method' => 'post', // Use POST method for logout
                    'class' => 'dropdown-item',
                ],
            ],
            ],
        ];
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
            <div class="col-md-6 text-center text-md-start">&copy; Sistem Informasi Klinik <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
