<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\url;
use app\models\NewsComments;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="news-view">

    <h2>Новость: <?=$model->title?></h2>
    <h3>Коротко:<?=$model->anounce?></h3>
    <p><?=$model->body?></p>

    <h3>Комментарии к новости</h3>

    <?php $dataProvider->pagination->pageSize=10; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"{items}\n{pager}",
        'columns' => [
            'commentator:ntext',
            [
                'attribute'=>'comment',
                'label' => 'Комментарий',
                'format'=>'raw',
                'value' => 'comment',

            ],
            'created_at',
        ],
    ]); ?>

    <h3>Оставить свой комментарий</h3>
    <?php

        $commentModel = new NewsComments();

        $form = ActiveForm::begin([
            'id' => 'comment-form',
            'method' => 'get',
            'action' => Url::to(['news-comments/addcomment']),
            'enableClientValidation' => true,
        ]);
    ?>

    <?= $form->field($commentModel, 'newsid')->hiddenInput(['value' => $model->ID])->label(false); ?>

    <?= $form->field($commentModel, 'commentator')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($commentModel, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($commentModel, 'status')->hiddenInput(['value' => 1])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end();



    ?>

</div>
