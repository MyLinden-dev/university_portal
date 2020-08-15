<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_header_link".
 *
 * @property int $id_header_link
 * @property int $id_link
 * @property string $annotation
 * @property string $date_from
 * @property string $date_to
 *
 * @property NLink $link
 */
class NHeaderLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_header_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_link', 'date_from'], 'required'],
            [['id_link'], 'default', 'value' => null],
            [['id_link'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['annotation'], 'string', 'max' => 255],
            [['id_link'], 'exist', 'skipOnError' => true, 'targetClass' => NLink::className(), 'targetAttribute' => ['id_link' => 'id_link']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_header_link' => 'Код ссылки в шапке',
            'id_link' => 'Код ссылки',
            'annotation' => 'Аннотация',
            'date_from' => 'Дата начала актуальности',
            'date_to' => 'Дата окончания актуальности',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLink()
    {
        return $this->hasOne(NLink::className(), ['id_link' => 'id_link']);
    }

    /**
     * {@inheritdoc}
     * @return NHeaderLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NHeaderLinkQuery(get_called_class());
    }
}
