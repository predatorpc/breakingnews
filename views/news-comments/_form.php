<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsComments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'newsid')->textInput() ?>

    <?= $form->field($model, 'commentator')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
