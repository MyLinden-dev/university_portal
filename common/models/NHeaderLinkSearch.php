<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NHeaderLink;

/**
 * NHeaderLinkSearch represents the model behind the search form of `common\models\NHeaderLink`.
 */
class NHeaderLinkSearch extends NHeaderLink
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_header_link', 'id_link'], 'integer'],
            [['annotation', 'date_from', 'date_to'], 'safe'],
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
        $query = NHeaderLink::find();

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
            'id_header_link' => $this->id_header_link,
            'id_link' => $this->id_link,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ]);

        $query->andFilterWhere(['ilike', 'annotation', $this->annotation]);

        return $dataProvider;
    }
}
