<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NStatistic]].
 *
 * @see NStatistic
 */
class NStatisticQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NStatistic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NStatistic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
