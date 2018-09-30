<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php
             $dataProvider->pagination->pageSize=20;
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'ID',
                [
                    'attribute'=>'title',
                    'label' => 'Заголовок',
                    'format'=>'raw',
                    'value' => function ($data, $url, $model) {
                        return Html::a($data['title'], "/news/update?id=".$data['ID']);
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

                [
                    'attribute'=>'catid',
                    'label' => 'Категория',
                    'format'=>'raw',
                    'value' => function ($data, $url, $model) {
                        return Category::find()->select('title')->where(['id' => $data['catid']])->scalar();
                    },
                ],
                [
                    'attribute'=>'status',
                    'label' => 'Активность',
                    'format'=>'raw',
                    'value' => function ($data, $url, $model) {
                        return $data['status'] ? 'Да' : 'Нет';
                    },
                ],

                'created_at',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
</div>
