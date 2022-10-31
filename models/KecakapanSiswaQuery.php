<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[KecakapanSiswa]].
 *
 * @see KecakapanSiswa
 */
class KecakapanSiswaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return KecakapanSiswa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return KecakapanSiswa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
