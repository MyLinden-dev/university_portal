<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_section_image".
 *
 * @property int $id_section_image
 * @property int $id_section
 * @property int $id_image
 * @property bool $is_on_slider
 * @property bool $is_main
 *
 * @property NImage $image
 * @property NSection $section
 */
class NSectionImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_section_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_section'], 'required'],
            [['id_section', 'id_image'], 'default', 'value' => null],
            [['id_section', 'id_image'], 'integer'],
            [['is_on_slider', 'is_main'], 'boolean'],
            [['id_image'], 'exist', 'skipOnError' => true, 'targetClass' => NImage::className(), 'targetAttribute' => ['id_image' => 'id_image']],
            [['id_section'], 'exist', 'skipOnError' => true, 'targetClass' => NSection::className(), 'targetAttribute' => ['id_section' => 'id_section']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_section_image' => 'Код изображения раздела',
            'id_section' => 'Код раздела',
            'id_image' => 'Код изображения',
            'is_on_slider' => 'На слайдере',
            'is_main' => 'Главное изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(NImage::className(), ['id_image' => 'id_image']);
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
     * @return NSectionImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NSectionImageQuery(get_called_class());
    }
}
