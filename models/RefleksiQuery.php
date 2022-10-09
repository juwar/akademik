<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Refleksi]].
 *
 * @see Refleksi
 */
class RefleksiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Refleksi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Refleksi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
