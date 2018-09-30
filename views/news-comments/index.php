<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsCommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии к новостям';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новый комментарий', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'newsid',
            [
                'attribute'=>'comment',
                'label' => 'Заголовок',
                'format'=>'raw',
                'value' => function ($data, $url, $model) {
                    return Html::a($data['comment'], "/news-comments/update?id=".$data['id']);
                },
            ],
            'commentator:ntext',
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
    ]); ?>
</div>
