<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NSectionImage;

/**
 * NSectionImageSearch represents the model behind the search form of `common\models\NSectionImage`.
 */
class NSectionImageSearch extends NSectionImage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_section_image', 'id_section', 'id_image'], 'integer'],
            [['is_on_slider', 'is_main'], 'boolean'],
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
        $query = NSectionImage::find();

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
            'id_section_image' => $this->id_section_image,
            'id_section' => $this->id_section,
            'id_image' => $this->id_image,
            'is_on_slider' => $this->is_on_slider,
            'is_main' => $this->is_main,
        ]);

        return $dataProvider;
    }
}
