<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property string $nip
 * @property string $nama
 * @property string $prodi
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'prodi'], 'required'],
            [['nip'], 'string', 'max' => 20],
            [['nama', 'prodi'], 'string', 'max' => 100],
            [['nip'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nip' => 'Nip',
            'nama' => 'Nama',
            'prodi' => 'Prodi',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DosenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DosenQuery(get_called_class());
    }
}
