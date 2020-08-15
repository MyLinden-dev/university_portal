<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NCategory;

/**
 * NCategorySearch represents the model behind the search form of `common\models\NCategory`.
 */
class NCategorySearch extends NCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category', 'id_parent_category'], 'integer'],
            [['title', 'description', 'color'], 'safe'],
            [['parent_title'], 'safe'],
            [['parent_id', 'id'], 'safe'],
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
        $query = NCategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['parent_title'] = [
            'asc' => ['parent.title' => SORT_ASC],
            'desc' => ['parent.title' => SORT_DESC],
            'default' => SORT_ASC
        ];

        $this->load($params);

        if (!$this->validate()) {
            $query->joinWith(['parent']);
            return $dataProvider;
        }

        $this->addCondition($query, 'id_category');
        $this->addCondition($query, 'id_parent_category');

        // grid filtering conditions
        $query->andFilterWhere([
            'n_category.id_category' => $this->id_category,
            'n_category.id_parent_category' => $this->id_parent_category,
        ]);

        $query->andFilterWhere(['ilike', 'n_category.title', $this->title])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'color', $this->color]);

        $query->joinWith(['parent' => function ($q) {
            $q->andFilterWhere(['ilike', 'parent.title', $this->parent_title]);
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
        $attribute = "parent.$attribute";
    
        if ($partialMatch) {
            $query->andWhere(['ilike', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
