<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "q_question".
 *
 * @property int $id_question
 * @property string $title
 * @property string $text
 * @property string $author
 * @property string $email
 * @property string $phone
 *
 * @property QQuestionImage[] $qQuestionImages
 */
class QQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'q_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 70],
            [['phone'], 'string', 'max' => 14],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_question' => 'Код вопроса',
            'title' => 'Заголовок',
            'text' => 'Вопрос',
            'author' => 'Автор',
            'email' => 'Email',
            'phone' => 'Телефон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQQuestionImages()
    {
        return $this->hasMany(QQuestionImage::className(), ['id_question' => 'id_question']);
    }

    /**
     * {@inheritdoc}
     * @return QQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QQuestionQuery(get_called_class());
    }
}
