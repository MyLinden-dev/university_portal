<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NImage;

/**
 * NImageSearch represents the model behind the search form of `common\models\NImage`.
 */
class NImageSearch extends NImage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_image'], 'integer'],
            [['path_image', 'path_background', 'title_image', 'title_background', 'db_image', 'db_background', 'image_type', 'background_type'], 'safe'],
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
        $query = NImage::find();

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
            'id_image' => $this->id_image,
        ]);

        $query->andFilterWhere(['ilike', 'path_image', $this->path_image])
            ->andFilterWhere(['ilike', 'path_background', $this->path_background])
            ->andFilterWhere(['ilike', 'db_image', $this->db_image])
            ->andFilterWhere(['ilike', 'db_background', $this->db_background])
            ->andFilterWhere(['ilike', 'image_type', $this->image_type])
            ->andFilterWhere(['ilike', 'background_type', $this->background_type])
            ->andFilterWhere(['ilike', 'title_image', $this->title_image])
            ->andFilterWhere(['ilike', 'title_background', $this->title_background]) 
            ;

        return $dataProvider;
    }
}
