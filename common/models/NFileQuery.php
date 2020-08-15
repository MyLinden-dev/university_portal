<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[NFile]].
 *
 * @see NFile
 */
class NFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return NFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return NFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
