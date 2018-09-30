<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsComments */

$this->title = 'Редактирование комментария';
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="news-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
