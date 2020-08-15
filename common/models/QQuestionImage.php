<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "q_question_image".
 *
 * @property int $id_question_image
 * @property int $id_question
 * @property int $id_image
 *
 * @property NImage $image
 * @property QQuestion $question
 */
class QQuestionImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'q_question_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_question', 'id_image'], 'default', 'value' => null],
            [['id_question', 'id_image'], 'integer'],
            [['id_image'], 'exist', 'skipOnError' => true, 'targetClass' => NImage::className(), 'targetAttribute' => ['id_image' => 'id_image']],
            [['id_question'], 'exist', 'skipOnError' => true, 'targetClass' => QQuestion::className(), 'targetAttribute' => ['id_question' => 'id_question']],
            [['image_path_image', 'question_title'], 'string', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_question_image' => 'Код изображения вопроса',
            'id_question' => 'Код вопроса',
            'id_image' => 'Код изображения',
            'question_title' => 'Вопрос',
            'image_path_image' => 'Изображение',
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
    public function getQuestion()
    {
        return $this->hasOne(QQuestion::className(), ['id_question' => 'id_question']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
     public function getQuestion_title()
     {
         return $this->question->title;
     }

     /**
     * @return \yii\db\ActiveQuery
     */
     public function getImage_path_image()
     {
         return $this->image->path_image;
     }

    /**
     * {@inheritdoc}
     * @return QQuestionImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QQuestionImageQuery(get_called_class());
    }
}
