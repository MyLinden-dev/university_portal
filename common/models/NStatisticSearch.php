<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NStatistic;

/**
 * NStatisticSearch represents the model behind the search form of `common\models\NStatistic`.
 */
class NStatisticSearch extends NStatistic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_statistic'], 'integer'],
            [['title', 'number', 'date_from', 'date_to', 'actual'], 'safe'],
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
        $query = NStatistic::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['actual'] = [
                        'asc' => ['date_to' => SORT_ASC],
                        'desc' => ['date_to' => SORT_DESC],
                        'default' => SORT_DESC
                        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $this->addCondition($query, 'date_from');
                $this->addCondition($query, 'date_to');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_statistic' => $this->id_statistic,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'number', $this->number]);

        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
                $modelAttribute = $attribute;
            }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
                return;
        }

        /*
        * Для корректной работы фильтра со связью со
        * свой же моделью делаем:
        */
        $attribute = "n_news.$attribute";

        if ($partialMatch) {
                $query->andWhere(['ilike', $attribute, $value]);
            } else {
                $query->andWhere([$attribute => $value]);
            }
    }
}
