<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "n_file".
 *
 * @property int $id_file
 * @property string $path_file
 * @property string $type_file
 *
 * @property NLink[] $nLinks
 */
class NFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'n_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path_file', 'title_file'], 'string'],
            [['type_file'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_file' => 'Код файла',
            'path_file' => 'Путь к файлу',
            'type_file' => 'Тип файла',
            'title_file' => 'Имя файла'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getTitleFileWithType()
     {
         return $this->title_file . '.' . $this->type_file;
     }
    
     /**
     * @return \yii\db\ActiveQuery
     */
     public function getAbsolutePathFile()
     {
         return $this->path_file . $this->title_file . '.' . $this->type_file;
     }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNLinks()
    {
        return $this->hasMany(NLink::className(), ['id_file' => 'id_file']);
    }

    /**
     * {@inheritdoc}
     * @return NFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NFileQuery(get_called_class());
    }
}
