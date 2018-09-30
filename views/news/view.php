<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'title:ntext',
            'anounce:ntext',
            'body:ntext',
            [
                'attribute' => 'catid',
                'value' => !empty(Category::find()->where(['id' => $model->catid])->one()->title) ?
                    Category::find()->where(['id' => $model->catid])->one()->title : "Корневая",
            ],

            [
                'attribute' => 'status',
                'value' => $model->status ? 'Да' : 'Нет',
            ],

        ],
    ])

    ?>

</div>
