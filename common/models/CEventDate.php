<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_event_date".
 *
 * @property int $id_event_date
 * @property int $id_event
 * @property string $date
 * @property string $time_from
 * @property string $time_to
 *
 * @property CEvent $event
 */
class CEventDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_event_date';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_event', 'date'], 'required'],
            [['id_event'], 'default', 'value' => null],
            [['id_event'], 'integer'],
            [['date', 'time_from', 'time_to'], 'safe'],
            [['id_event'], 'exist', 'skipOnError' => true, 'targetClass' => CEvent::className(), 'targetAttribute' => ['id_event' => 'id_event']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_event_date' => 'Код даты события',
            'id_event' => 'Код события',
            'date' => 'Дата проведения события',
            'time_from' => 'Время начала события',
            'time_to' => 'Время окончания события',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(CEvent::className(), ['id_event' => 'id_event']);
    }

    /**
     * {@inheritdoc}
     * @return CEventDateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CEventDateQuery(get_called_class());
    }
}
