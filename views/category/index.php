<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatgegorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1>Список категорий</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить катгорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'parentid',
                'label' => 'Родительская категория',
                'format'=>'raw',
                'value' => function ($data, $url, $model) {
                    return Category::find()->select('title')->where(['id' => $data['parentid']])->scalar();
                },
            ],
            'title:ntext',
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
    ]); ?>
</div>
