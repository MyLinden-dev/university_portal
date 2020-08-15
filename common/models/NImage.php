<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_image".
 *
 * @property int $id_image
 * @property string $path_image
 * @property string $path_background
 * @property resource $db_image
 * @property resource $db_background
 * @property string $image_type
 * @property string $background_type
 *
 * @property CDateImage[] $cDateImages
 * @property NLink[] $nLinks
 * @property NSectionImage[] $nSectionImages
 * @property QQuestionImage[] $qQuestionImages
 */
class NImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path_image', 'title_image', 'title_background', 'path_background', 'db_image', 'db_background'], 'string'],
            [['image_type', 'background_type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_image' => 'Код изображения',
            'path_image' => 'Путь к изображению',
            'path_background' => 'Путь к фону',
            'db_image' => 'Изображение в базе данных',
            'db_background' => 'Фон в базе данных',
            'image_type' => 'Тип изображения',
            'background_type' => 'Тип фона',
            'title_image' => 'Имя файла',
            'title_background' => 'Имя фона',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getTitleImageWithType()
     {
         return $this->title_image . '.' . $this->image_type;
     }
    
    /**
     * @return \yii\db\ActiveQuery
     */
     public function getPathForShowImage()
     {
        /* Для отображения картинки использовать один из этих путей.
        <p class="text-center pb-3"><img src="/admin/dbimg/VK-logo.png" alt=""></p>
        <p class="text-center pb-3"><img src="/dbimg/VK-logo.png" alt=""></p>
    */
        return '/admin/dbimg/' . $this->titleImageWithType;
     }               

     /**
     * @return \yii\db\ActiveQuery
     */
     public function getAbsolutePathImage()
     {
         return $this->path_image . $this->title_image . '.' . $this->image_type;
     }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCDateImages()
    {
        return $this->hasMany(CDateImage::className(), ['id_image' => 'id_image']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNLinks()
    {
        return $this->hasMany(NLink::className(), ['id_image' => 'id_image']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNSectionImages()
    {
        return $this->hasMany(NSectionImage::className(), ['id_image' => 'id_image']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQQuestionImages()
    {
        return $this->hasMany(QQuestionImage::className(), ['id_image' => 'id_image']);
    }

    /**
     * {@inheritdoc}
     * @return NImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NImageQuery(get_called_class());
    }
}
