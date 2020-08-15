<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NSectionImage]].
 *
 * @see NSectionImage
 */
class NSectionImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NSectionImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NSectionImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
