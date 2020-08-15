<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NFile;

/**
 * NFileSearch represents the model behind the search form of `common\models\NFile`.
 */
class NFileSearch extends NFile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_file'], 'integer'],
            [['path_file', 'type_file', 'title_file'], 'safe'],
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
        $query = NFile::find();

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
            'id_file' => $this->id_file,
        ]);

        $query->andFilterWhere(['ilike', 'path_file', $this->path_file])
            ->andFilterWhere(['ilike', 'type_file', $this->type_file]);
            ->andFilterWhere(['ilike', 'title_file', $this->title_file]);

        return $dataProvider;
    }
}
