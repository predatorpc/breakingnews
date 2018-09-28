<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;

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
                'title:ntext',
                'anounce:ntext',
                'body:ntext',
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


                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
</div>
