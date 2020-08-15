<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_link".
 *
 * @property int $id_link
 * @property int $id_image
 * @property int $id_file
 * @property string $title
 * @property string $page_url
 * @property bool $is_useful
 * @property string $beauty_title
 *
 * @property NHeaderLink[] $nHeaderLinks
 * @property NFile $file
 * @property NImage $image
 * @property NSectionLink[] $nSectionLinks
 */
class NLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_image', 'id_file'], 'default', 'value' => null],
            [['id_image', 'id_file'], 'integer'],
            [['page_url'], 'string'],
            [['is_useful'], 'boolean'],
            [['title'], 'string', 'max' => 255],
            [['beauty_title'], 'string', 'max' => 30],
            [['id_file'], 'exist', 'skipOnError' => true, 'targetClass' => NFile::className(), 'targetAttribute' => ['id_file' => 'id_file']],
            [['id_image'], 'exist', 'skipOnError' => true, 'targetClass' => NImage::className(), 'targetAttribute' => ['id_image' => 'id_image']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_link' => 'Код ссылки',
            'id_image' => 'Код изображения',
            'id_file' => 'Код файла',
            'title' => 'Название',
            'page_url' => 'Url страницы',
            'is_useful' => 'Полезная ссылка',
            'beauty_title' => 'Краткое название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNHeaderLinks()
    {
        return $this->hasMany(NHeaderLink::className(), ['id_link' => 'id_link']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(NFile::className(), ['id_file' => 'id_file']);
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
    public function getNSectionLinks()
    {
        return $this->hasMany(NSectionLink::className(), ['id_link' => 'id_link']);
    }

    /**
     * {@inheritdoc}
     * @return NLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NLinkQuery(get_called_class());
    }
}
