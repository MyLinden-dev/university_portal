<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NLink]].
 *
 * @see NLink
 */
class NLinkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
