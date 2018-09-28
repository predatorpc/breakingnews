<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\News */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['/']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="news-view">

    <h1>Просмотр категории новостей: <?= Html::encode($model->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title:ntext',
            'anounce:ntext',
            'body:ntext',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
