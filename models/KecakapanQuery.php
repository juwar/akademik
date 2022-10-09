<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Kecakapan]].
 *
 * @see Kecakapan
 */
class KecakapanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Kecakapan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Kecakapan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
