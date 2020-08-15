<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_news".
 *
 * @property int $id_news
 * @property int $id_category
 * @property string $title
 * @property string $date_add
 * @property string $date_from
 * @property string $date_to
 * @property string $slider_annotation
 * @property bool $is_on_slider
 *
 * @property CEvent[] $cEvents
 * @property NCategory $nCategory
 * @property NSection[] $nSections
 */
class NNews extends \yii\db\ActiveRecord
{

    public $ncategory_title;
    //public $actual;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_news';
    }
/*
    public function defaultScope() {
        return array(
            'alias' => $this->tableName(),
        );
    }*/

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category'], 'default', 'value' => null],
            [['id_category'], 'integer'],
            [['title', 'date_from'], 'required'],
            [['date_add', 'date_from', 'date_to', 'ncategory_title'], 'safe'],
            [['is_on_slider', 'actual'], 'boolean'],
            [['title', 'slider_annotation', 'ncategory_title'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => NCategory::className(), 'targetAttribute' => ['id_category' => 'id_category']],
            //['ncategory_title', 'string', 'required']
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_news' => 'Код новости',
            'id_category' => 'Код категории',
            'title' => 'Заголовок новости',
            'date_add' => 'Дата добавления',
            'date_from' => 'Дата начала акутальности',
            'date_to' => 'Дата окончания акутальности',
            'slider_annotation' => 'Аннотация для слайдера',
            'is_on_slider' => 'В слайдере',
            'ncategory_title' => 'Категория',
            'actual' => 'Актуальность',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCEvents()
    {
        return $this->hasMany(CEvent::className(), ['id_news' => 'id_news']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNCategory()
    {
        return $this->hasOne(NCategory::className(), ['id_category' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getNCategory_title()
     {
         return $this->nCategory->title;
     }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNSections()
    {
        return $this->hasMany(NSection::className(), ['id_news' => 'id_news']);
    }

    public function getActual() {
        return (
            (
                $this->find()
                ->select('date_from, date_to')
                ->where(['id_news' =>  $this->id_news])
                ->andWhere(['<=','date_from', date("Y-m-d")])
                ->andWhere(['>=','COALESCE(n_news.date_to, CURRENT_DATE)', date("Y-m-d")])
                ->all() != null
            ) ? 1 : 0);
    }
    /**
     * {@inheritdoc}
     * @return NNewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NNewsQuery(get_called_class());
    }
}
