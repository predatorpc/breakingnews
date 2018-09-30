<?php

use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\TopMenu;
use yii\widgets\Menu;
use app\models\Category;
use yii\helpers\Html;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */

$this->title = 'Breaking News';
?>
<div class="site-index">
        <table border="0" width="100%">
            <tr>
                <td colspan="2" align="center" valign="top">
                    <h2>Добрый день! Самые горячие новости на BreakingNews</h2><br><br>
                </td>
            </tr>
            <tr>
                <td width="40%" valign="top">
                    <h3>Меню</h3>
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

                <td width="60%" valign="top">
                    <h3>Новости</h3>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'layout'=>"{items}\n{pager}",
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
                                [
                                    'attribute' => 'anounce',
                                    'value' => function ($model) {
                                        return StringHelper::truncate($model->anounce, 200);
                                    }
                                ],
                                [
                                    'attribute'=>'catid',
                                    'label' => 'Категория',
                                    'format'=>'raw',
                                    'value' => function ($data, $url, $model) {
                                        return Category::find()->select('title')->where(['id' => $data['catid']])->scalar();
                                    },
                                ],
                                'created_at',
                            ],
                        ]); ?>

                </td>
            </tr>
        </table>
</div>
