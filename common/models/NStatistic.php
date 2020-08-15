<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_statistic".
 *
 * @property int $id_statistic
 * @property string $title
 * @property string $number
 * @property string $date_from
 * @property string $date_to
 */
class NStatistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_statistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_from', 'date_to'], 'safe'],
            [['title'], 'string', 'max' => 60],
            [['number'], 'string', 'max' => 10],
        ];
    }

    public function getActual() {
                return (
                            (
                                    $this->find()
                                    ->select('date_from, date_to')
                                ->where(['id_statistic' =>  $this->id_statistic])
                            ->andWhere(['<=','date_from', date("Y-m-d")])
                        ->andWhere(['>=','COALESCE(date_to, CURRENT_DATE)', date("Y-m-d")])
                        ->all() != null
                    ) ? 1 : 0);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_statistic' => 'Код статистики',
            'title' => 'Подпись',
            'number' => 'Число',
            'date_from' => 'Дата начала актуальности',
            'date_to' => 'Дата окончания актуальности',
            'actual' => 'Актуальность',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NStatisticQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NStatisticQuery(get_called_class());
    }
}
