<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_section".
 *
 * @property int $id_section
 * @property int $id_news
 * @property string $title
 * @property string $text
 * @property bool $is_hidden
 *
 * @property NNews $news
 * @property NSectionImage[] $nSectionImages
 * @property NSectionLink[] $nSectionLinks
 */
class NSection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_news'], 'required'],
            [['id_news'], 'default', 'value' => null],
            [['id_news'], 'integer'],
            [['text'], 'string'],
            [['is_hidden'], 'boolean'],
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
            'id_section' => 'Код раздела',
            'id_news' => 'Код новости',
            'title' => 'Название раздела',
            'text' => 'Текст раздела',
            'is_hidden' => 'Скрывается "под кат"',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(NNews::className(), ['id_news' => 'id_news']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNSectionImages()
    {
        return $this->hasMany(NSectionImage::className(), ['id_section' => 'id_section']);
    }

    /**
     * {@inheritdoc}
     * @return NSectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NSectionQuery(get_called_class());
    }
}
