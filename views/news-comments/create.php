<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewsComments */

$this->title = 'Добавить комментарий';
$this->params['breadcrumbs'][] = ['label' => 'Новый комментарий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
