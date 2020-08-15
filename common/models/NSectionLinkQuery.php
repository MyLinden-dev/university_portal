<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NSectionLink]].
 *
 * @see NSectionLink
 */
class NSectionLinkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NSectionLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NSectionLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
