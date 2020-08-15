<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NSection;

/**
 * NSectionSearch represents the model behind the search form of `common\models\NSection`.
 */
class NSectionSearch extends NSection
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_section', 'id_news'], 'integer'],
            [['title', 'text'], 'safe'],
            [['is_hidden'], 'boolean'],
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
        $query = NSection::find();

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
            'id_section' => $this->id_section,
            'id_news' => $this->id_news,
            'is_hidden' => $this->is_hidden,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'text', $this->text]);

        return $dataProvider;
    }
}
