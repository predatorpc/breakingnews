<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $parentid
 * @property string $title
 * @property string $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parentid', 'status'], 'default', 'value' => null],
            [['parentid', 'status'], 'integer'],
            [['title'], 'string'],
            [['id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Категории',
            'parentid' => 'Родительская категория',
            'title' => 'Наименование',
            'status' => 'Активность',
        ];
    }
}
