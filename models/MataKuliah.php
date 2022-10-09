<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mata_kuliah".
 *
 * @property string $kode
 * @property string $nama
 * @property int $sks
 */
class MataKuliah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mata_kuliah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'sks'], 'required'],
            [['sks'], 'integer'],
            [['kode'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'nama' => 'Nama',
            'sks' => 'Sks',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MataKuliahQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MataKuliahQuery(get_called_class());
    }
}
