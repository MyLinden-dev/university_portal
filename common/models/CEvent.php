<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_event".
 *
 * @property int $id_event
 * @property int $id_news
 * @property string $title
 * @property string $text
 * @property string $date_from
 * @property string $date_to
 *
 * @property NNews $news
 * @property CEventDate[] $cEventDates
 */
class CEvent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_news', 'date_from'], 'required'],
            [['id_news'], 'default', 'value' => null],
            [['id_news'], 'integer'],
            [['text'], 'string'],
            [['date_from', 'date_to'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['id_news'], 'exist', 'skipOnError' => true, 'targetClass' => NNews::className(), 'targetAttribute' => ['id_news' => 'id_news']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_event' => 'Код события',
            'id_news' => 'Код новости',
            'title' => 'Событие',
            'text' => 'Текст события',
            'date_from' => 'Дата начала актуальности',
            'date_to' => 'Дата окончания актуальности',
            'actual' => 'Актуальность',
            'nnews_title' => 'Новость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNNews()
    {
        return $this->hasOne(NNews::className(), ['id_news' => 'id_news']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCEventDates()
    {
        return $this->hasMany(CEventDate::className(), ['id_event' => 'id_event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNNews_title()
    {
        return $this->nNews->title;
    }

    /**
     * @return \yii\db\ActiveQuery
    */
    public function getActual() {
        return (
            (
                $this->find()
                ->select('date_from, date_to')
                ->where(['id_event' =>  $this->id_event])
                ->andWhere(['<=','date_from', date("Y-m-d")])
                ->andWhere(['>=','COALESCE(c_event.date_to, CURRENT_DATE)', date("Y-m-d")])
                ->all() != null
            ) ? 1 : 0);
    }

    /**
     * {@inheritdoc}
     * @return CEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CEventQuery(get_called_class());
    }
}
