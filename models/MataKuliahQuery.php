<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MataKuliah]].
 *
 * @see MataKuliah
 */
class MataKuliahQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MataKuliah[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MataKuliah|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
