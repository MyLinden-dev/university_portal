<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NNews;

/**
 * NNewsSearch represents the model behind the search form of `common\models\NNews`.
 */
class NNewsSearch extends NNews
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_news', 'id_category'], 'integer'],
            [['title', 'date_add', 'date_from', 'date_to', 'slider_annotation'], 'safe'],
            [['is_on_slider', 'actual'], 'boolean'],
            [['ncategory_title', 'actual'], 'safe']
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
        $query = NNews::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /**
        * Настройка параметров сортировки
        * Важно: должна быть выполнена раньше $this->load($params)
        * statement below
        */

        $dataProvider->sort->attributes['ncategory_title'] = [
            'asc' => ['n_category.title' => SORT_ASC],
            'desc' => ['n_category.title' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $dataProvider->sort->attributes['actual'] = [
            'asc' => ['date_to' => SORT_ASC],
            'desc' => ['date_to' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->defaultOrder = ['actual' => SORT_DESC, 'ncategory_title' => SORT_ASC];

        $this->load($params);

        if (!$this->validate()) {
            /**
             * Жадная загрузка данных модели Категории
             * для работы сортировки.
             */
            $query->joinWith(['nCategory']);
            return $dataProvider;
        }

        $this->addCondition($query, 'id_news');
        $this->addCondition($query, 'id_category');
        $this->addCondition($query, 'date_from');
        $this->addCondition($query, 'date_to');
/*
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
*/
        // grid filtering conditions
        $query->andFilterWhere([
            'n_news.id_news' => $this->id_news,
            'n_news.id_category' => $this->id_category,
            'date_add' => $this->date_add,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'is_on_slider' => $this->is_on_slider,
        ]);

        $query->andFilterWhere(['ilike', 'n_news.title', $this->title])
            ->andFilterWhere(['ilike', 'slider_annotation', $this->slider_annotation]);
        
        $query->joinWith(['nCategory' => function ($q) {
            $q->andFilterWhere(['ilike', 'n_category.title', $this->ncategory_title]);
        }]);

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
