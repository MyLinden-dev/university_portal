<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c_date_image".
 *
 * @property int $id_date_image
 * @property int $id_image
 * @property string $date
 * @property string $title
 *
 * @property NImage $image
 */
class CDateImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_date_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_image'], 'default', 'value' => null],
            [['id_image'], 'integer'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['id_image'], 'exist', 'skipOnError' => true, 'targetClass' => NImage::className(), 'targetAttribute' => ['id_image' => 'id_image']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_date_image' => 'Код изображения даты',
            'id_image' => 'Код изображения',
            'date' => 'Дата',
            'title' => 'Название',
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
     * {@inheritdoc}
     * @return CDateImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CDateImageQuery(get_called_class());
    }
}
