<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CEvent]].
 *
 * @see CEvent
 */
class CEventQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CEvent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CEvent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
