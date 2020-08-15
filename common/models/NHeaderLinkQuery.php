<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NHeaderLink]].
 *
 * @see NHeaderLink
 */
class NHeaderLinkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NHeaderLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NHeaderLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
