<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TopMenu;
use yii\widgets\Menu;
use app\models\Category;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Breaking News';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Добрый день!</h1>
        <p class="lead">Новостной сайт приветствует Вас!</p>
    </div>

    <div class="body-content">

        <table border="0" width="100%">
            <tr>
                <td>
                    <?php
                        echo Menu::widget([
                            'options' => ['class' => 'clearfix', 'id'=>'main-menu'],
                            'encodeLabels'=>false,
                            'activateParents'=>true,
                            'activeCssClass'=>'current-menu-item',
                            // подключаем модель и  вызываем метод,  который строит всю логику формирования меню
                            'items' => app\models\TopMenu::viewMenuItems(0),
                        ]);
                        $dataProvider->pagination->pageSize=3;
                    ?>
                </td>

                <td>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute'=>'title',
                                    'label' => 'Заголовок',
                                    'format'=>'raw',
                                    'value' => function ($data, $url, $model) {
                                        return Html::a($data['title'], "/news/".$data['title']);
                                    },
                                ],
                                'anounce:ntext',
                                'created_at',
                                [
                                    'attribute'=>'catid',
                                    'label' => 'Категория',
                                    'format'=>'raw',
                                    'value' => function ($data, $url, $model) {
                                        return Category::find()->select('title')->where(['id' => $data['catid']])->scalar();
                                    },
                                ],
                                [
                                    'attribute'=>'status',
                                    'label' => 'Активность',
                                    'format'=>'raw',
                                    'value' => function ($data, $url, $model) {
                                        return $data['status'] ? 'Да' : 'Нет';
                                    },
                                ],
                            ],
                        ]); ?>

                </td>
            </tr>
        </table>

    </div>
</div>
