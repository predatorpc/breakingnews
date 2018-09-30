<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if(Yii::$app->user->isGuest){

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'О Нас', 'url' => ['/site/about']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
                Yii::$app->user->isGuest ? (['label' => 'Вход', 'url' => ['/site/login']]) : ( ['label' => 'Выход', 'url' => ['/site/logout']] ),
            ],
        ]);
        NavBar::end();
    }
    else
    {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Новости', 'url' => ['/news']],
                    ['label' => 'Комментарии', 'url' => ['/news-comments']],
                    ['label' => 'Категории', 'url' => ['/category']],
                    ['label' => 'Управление', 'url' => ['/site/admin']],
                    ['label' => 'Выход', 'url' => ['/site/logout']],
            ],
        ]);
        NavBar::end();
    }

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Breaking news <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
