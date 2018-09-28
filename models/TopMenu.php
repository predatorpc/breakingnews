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

            $existsID = News::find()->where(['catid'=> $result->id])->exists();
           // $existsParentID = News::find()->where(['catid'=> $result->parentid])->exists();

                if(!empty($existsID))
                    $items[$result->parentid][$i] = $result->attributes;

        }

        return $items;
    }

    public static function viewMenuItems($parentId = 0)
    {
        $arrItems = self::getMenuItems();

        if (empty($arrItems[$parentId])) {
           return;
        }

        foreach($arrItems[$parentId] as $items) {

            $result[] = [
                'label' => $items['title'],
                'url' => '/category/'.$items['title'],
                'linkOptions' => ['title' => $items['title']],
                'items' => self::viewMenuItems($items['id']),
            ];
        }

        return $result;
    }
}