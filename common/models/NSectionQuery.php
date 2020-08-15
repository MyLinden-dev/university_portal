<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NSection]].
 *
 * @see NSection
 */
class NSectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NSection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NSection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
