<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_section_link".
 *
 * @property int $id_section_link
 * @property int $id_section
 * @property int $id_link
 *
 * @property NLink $link
 * @property NSection $section
 */
class NSectionLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_section_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_section', 'id_link'], 'default', 'value' => null],
            [['id_section', 'id_link'], 'integer'],
            [['id_link'], 'exist', 'skipOnError' => true, 'targetClass' => NLink::className(), 'targetAttribute' => ['id_link' => 'id_link']],
            [['id_section'], 'exist', 'skipOnError' => true, 'targetClass' => NSection::className(), 'targetAttribute' => ['id_section' => 'id_section']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_section_link' => 'Код ссылки раздела',
            'id_section' => 'Код раздела',
            'id_link' => 'Код ссылки',
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
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(NSection::className(), ['id_section' => 'id_section']);
    }

    /**
     * {@inheritdoc}
     * @return NSectionLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NSectionLinkQuery(get_called_class());
    }
}
