<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\News;

/* @var $this yii\web\View */
/* @var $model app\models\NewsComments */

$title = News::find()->where(['ID'=>$model->newsid])->one()->title;

$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="news-comments-view">

    <h3>Комментарий к новости: <?= Html::encode($title); ?></h3>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'newsid',
            'comment:ntext',
            'commentator:ntext',
            [
                'attribute' => 'status',
                'value' => $model->status ? 'Да' : 'Нет',
            ],

            'created_at',
        ],
    ]) ?>

</div>
