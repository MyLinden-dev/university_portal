<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_category".
 *
 * @property int $id_category
 * @property int $id_parent_category
 * @property string $title
 * @property string $description
 * @property string $color
 *
 * @property NNews[] $nNews
 */
class NCategory extends \yii\db\ActiveRecord
{
    public $parent_title;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parent_category'], 'default', 'value' => null],
            [['id_parent_category'], 'integer'],
            [['title'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 7],
            [['title'], 'unique'],
            [['parent_id', 'id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'Код категории',
            'id_parent_category' => 'Код родительской категории',
            'title' => 'Название категории',
            'description' => 'Описание',
            'color' => 'Цвет',
            'parent_title' => 'Родительская категория',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNNews()
    {
        return $this->hasMany(NNews::className(), ['id_category' => 'id_category']);
    }

    /* Связь */
    public function getParent() {
        return $this->hasOne(self::classname(),
            // Ни трогать, рядом ни дышать. Порядок ВАЖЕН!
           ['id_category' => 'id_parent_category'])->
           from(self::tableName() . ' AS parent');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getParent_title()
     {
         return $this->parent->title;
     }

     /**
     * @return \yii\db\ActiveQuery
     */
     public function getParent_id()
     {
         return $this->id_parent_category;
     }

     /**
     * @return \yii\db\ActiveQuery
     */
     public function getId()
     {
         return $this->id_category;
     }

    /**
     * {@inheritdoc}
     * @return NCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NCategoryQuery(get_called_class());
    }
    
}
