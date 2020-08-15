<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\QQuestionImage;

/**
 * QQuestionImageSearch represents the model behind the search form of `common\models\QQuestionImage`.
 */
class QQuestionImageSearch extends QQuestionImage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_question_image', 'id_question', 'id_image'], 'integer'],
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
        $query = QQuestionImage::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['question_title'] = [
            'asc' => ['q_question.title' => SORT_ASC],
            'desc' => ['q_question.title' => SORT_DESC],
            'default' => SORT_ASC
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['question']);
            return $dataProvider;
        }

        $this->addCondition($query, 'id_question_image');
        $this->addCondition($query, 'id_question');
        $this->addCondition($query, 'id_image');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_question_image' => $this->id_question_image,
            'id_question' => $this->id_question,
            'id_image' => $this->id_image,
        ]);

        $query->andFilterWhere(['ilike', 'q_question.title', $this->question->title]);

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
        $attribute = "q_question_image.$attribute";
    
        if ($partialMatch) {
            $query->andWhere(['ilike', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
