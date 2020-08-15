<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CEventDate;

/**
 * CEventDateSearch represents the model behind the search form of `common\models\CEventDate`.
 */
class CEventDateSearch extends CEventDate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_event_date', 'id_event'], 'integer'],
            [['date', 'time_from', 'time_to'], 'safe'],
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
        $query = CEventDate::find();

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
            'id_event_date' => $this->id_event_date,
            'id_event' => $this->id_event,
            'date' => $this->date,
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
        ]);

        return $dataProvider;
    }
}
