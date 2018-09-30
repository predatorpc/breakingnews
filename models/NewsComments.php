<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newsComments".
 *
 * @property int $id
 * @property int $newsid
 * @property string $comment
 * @property string $commentator
 * @property int $status
 */
class NewsComments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsComments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['newsid', 'commentator','comment'], 'required'],
            [['newsid', 'status'], 'default', 'value' => null],
            [['newsid', 'status'], 'integer'],
            [['comment', 'commentator'], 'string'],
            [['created_at'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Комментария',
            'newsid' => 'ID Новости',
            'comment' => 'Комментарий',
            'commentator' => 'Автор',
            'status' => 'Активность',
            'created_at' => 'Дата добавления',
        ];
    }
}
