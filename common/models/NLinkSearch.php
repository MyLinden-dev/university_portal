<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NLink;

/**
 * NLinkSearch represents the model behind the search form of `common\models\NLink`.
 */
class NLinkSearch extends NLink
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_link', 'id_image', 'id_file'], 'integer'],
            [['title', 'page_url', 'beauty_title'], 'safe'],
            [['is_useful'], 'boolean'],
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
        $query = NLink::find();

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
            'id_link' => $this->id_link,
            'id_image' => $this->id_image,
            'id_file' => $this->id_file,
            'is_useful' => $this->is_useful,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'page_url', $this->page_url])
            ->andFilterWhere(['ilike', 'beauty_title', $this->beauty_title]);

        return $dataProvider;
    }
}
