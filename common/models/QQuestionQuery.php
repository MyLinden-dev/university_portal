<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[QQuestion]].
 *
 * @see QQuestion
 */
class QQuestionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return QQuestion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return QQuestion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
