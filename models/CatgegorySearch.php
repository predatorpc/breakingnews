<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CatgegorySearch represents the model behind the search form of `app\models\Category`.
 */
class CatgegorySearch extends Category
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parentid', 'status'], 'integer'],
            [['title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Category::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parentid' => $this->parentid,
        ]);

        // ����� �� ��������
        $query->andFilterWhere(['ilike', 'title', $this->title]);

        return $dataProvider;
    }

    public function searchForNewsInCategory($title)
    {
        $catID = Category::find()->select('id')->where(['title' => $title])->scalar();

        $query = News::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andWhere([
            'catid' => $catID, // ������ ����������� � ���� ���������
            'status' => 1, //������ ��������
        ]);

        //������ ���������� �����
        return $dataProvider;
    }
}
