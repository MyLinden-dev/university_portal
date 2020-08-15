<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NCategory]].
 *
 * @see NCategory
 */
class NCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
