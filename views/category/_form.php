<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\Category;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // = $form->field($model, 'id')->textInput() ?>

    <?php //= $form->field($model, 'parentid')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength'=>100]) ?>

    <?php
        //перенести в контроллер надо
        $category = Category::find()->select(['title as value', 'title as label', 'id as id'])->where(['status' => 1])->asArray()->all();
        $cat = Category::find()->select('title')->where(['id' => $model->parentid])->scalar();
        $value = !empty($cat) ? $cat : "";
    ?>

    <?= AutoComplete::widget([
        'name' => 'Начните вводить название категории...',
        'id' => '0',
        'value' => $value,
        'clientOptions' => [
            'source' => $category,
            'autoFill' => true,
            'minLength' => '1',
            'select' => new JsExpression("
                function( event, ui ) {
                    $('#category-parentid').val(ui.item.id);
                }"
            )],
        'options' => [
            'placeholder'=>'Начните вводить название категории новостей...(По умполчанию главные новости)',
            'class' => 'form-control'
        ]
    ]);
    ?>

    <?= $form->field($model, 'parentid')->hiddenInput(['value' => 1])->label(false) ?>
    <br>
    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
