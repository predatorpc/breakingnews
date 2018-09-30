<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\StringHelper;

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

            [
                'attribute'=>'title',
                'label' => 'Заголовок',
                'format'=>'raw',
                'value' => function ($data, $url, $model) {
                    return Html::a($data['title'], "/news/".$data['title']);
                },
            ],
            [
                'attribute' => 'anounce',
                'value' => function ($model) {
                    return StringHelper::truncate($model->anounce, 200);
                }
            ],
            [
                'attribute' => 'body',
                'value' => function ($model) {
                    return StringHelper::truncate($model->body, 200);
                }
            ],
            'created_at',

         //   ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
