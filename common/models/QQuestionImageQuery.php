<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[QQuestionImage]].
 *
 * @see QQuestionImage
 */
class QQuestionImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return QQuestionImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return QQuestionImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
