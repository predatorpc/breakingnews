<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'ID')->textInput() ?>

    <?= $form->field($model, 'title')->textinput() ?>

    <?= $form->field($model, 'anounce')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php

    //перенести в контроллер надо
    $category = Category::find()->select(['id as value', 'title as label'])->where(['status' => 1])->asArray()->all();

    echo $form->field($model, 'catid')->widget(
        AutoComplete::className(), [
        'clientOptions' => [
            'source' => $category,
        ],
        'options'=>[
            'class'=>'form-control'
        ]
    ]);
    ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
