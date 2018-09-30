<?php

// менюшка для навигации по новостям
// predator_pc  09/2018

namespace app\models;
use app\models\Category;

class TopMenu
{
    private static function getMenuItems()
    {
        $items = [];
        $resultAll = Category::find()->where(['status' => 1])->all();

        foreach ($resultAll as $i => $result) {
            if (empty($items[$result->parentid])) {
                $items[$result->parentid] = [];
            }
            $items[$result->parentid][] = $result->attributes;
        }

        return $items;
    }

    public static function viewMenuItems($parentId = 0)
    {
        $result = [];
        $arrItems = self::getMenuItems();

        // если совсем ничего нет то возвращаемся
        if (empty($arrItems[$parentId])) {
           return;
        }

        foreach($arrItems[$parentId] as $items) {
            //получаем кол-ва новостей или количество детей в дереве
            $newsCount = News::find()->where(['catid' => $items['id'], 'status' => 1])->count();
            $childrensCount = Category::find()->where(['parentid' => $items['id']])->count();
            $getAllChildrens = Category::find()->where(['parentid' => $items['id']])->asArray()->all();

            $childrens = [];
            foreach ($getAllChildrens as $children){
                $childrens[] = $children['id'];
            }

          //  print_arr($childrens);

            $childrensHasNews = Category::find()
                ->leftJoin('news','category.id = news.catid')
                ->where(['news.catid' => $childrens])
                ->orWhere(['category.id' => $childrens])
                ->orWhere(['category.parentid' => $childrens])
                ->andWhere(['news.status' => 1])
                ->andWhere(['category.status' => 1])
                ->count();

      //      print_arr($childrensHasNews);//die();

            //в зависимости от результатата добавляем в массив или нет
            //есть новости или новостей нет но есть дети тогда добавляем
            if (!empty($newsCount) || (!empty($childrensCount) && !empty($childrensHasNews))){
                $result[] = [
                    //'label' => $childrensHasNews > 0  ?  $items['title']." (". $childrensHasNews . ") " :  $items['title']." (". $newsCount . ") ",
                    //'label' => $items['title'] . " (". ($childrensHasNews + $newsCount) . ") ",
                    //'label' => $items['title'] . " [ ".$childrensHasNews." ] - (" . $newsCount . ")",
                    'label' => $items['title'] . " (" . $newsCount . ") ",
                    'url' => '/category/' . $items['title'],
                    'linkOptions' => ['title' => $items['title']],
                    'items' => self::viewMenuItems($items['id']),
                ];
            }
        }

        return $result;
    }
}