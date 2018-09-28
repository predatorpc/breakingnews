<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $ID
 * @property string $title
 * @property string $anounce
 * @property string $body
 * @property string $catid
 * @property string $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'catid'], 'required'],
            [['catid', 'status'], 'default', 'value' => null],
            [['catid', 'status'], 'integer'],
            [['status'], 'integer'],
            [['title', 'anounce', 'body'], 'string'],
            [['created_at'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID Новости',
            'title' => 'Заголовок',
            'anounce' => 'Анонс',
            'body' => 'Текст',
            'catid' => 'ID Категории (Начните вводить название)',
            'status' => 'Активность',
            'created_at' => 'Дата добавления',
        ];
    }
}
