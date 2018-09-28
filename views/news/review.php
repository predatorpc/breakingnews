<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

?>
<div class="news-view">
    <h1>Просмотр новости <?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'title:ntext',
            'anounce:ntext',
            'body:ntext',
            'catid',
            'status',
        ],
    ]) ?>

</div>
