<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NewsComments;

/**
 * NewsCommentsSearch represents the model behind the search form of `app\models\NewsComments`.
 */
class NewsCommentsSearch extends NewsComments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'newsid', 'status'], 'integer'],
            [['comment', 'commentator'], 'safe'],
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
        $query = NewsComments::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'newsid' => $this->newsid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['ilike', 'comment', $this->comment])
            ->andFilterWhere(['ilike', 'commentator', $this->commentator]);

        return $dataProvider;
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchForSingleNews($id)
    {
        $query = NewsComments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'newsid' => $id,
            'status' => 1,
        ]);

        $query->orderBy('created_at DESC');

        return $dataProvider;
    }
}
