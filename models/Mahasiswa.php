<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nim
 * @property string $nama
 * @property string $prodi
 * @property string $pembimbing
 * @property string $telpon
 * @property string $alamat
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama', 'prodi', 'id_dosen', 'telpon', 'alamat'], 'required'],
            [['nim'], 'string', 'max' => 20],
            [['nama', 'prodi', 'id_dosen'], 'string', 'max' => 100],
            [['telpon'], 'string', 'max' => 15],
            [['alamat'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nama' => 'Nama',
            'prodi' => 'Prodi',
            'id_dosen' => 'Id Dosen',
            'telpon' => 'Telpon',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MahasiswaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MahasiswaQuery(get_called_class());
    }

    public function getDataDosen()
    {
        return $this->hasOne(Dosen::className(), ['nip' => 'id_dosen']);
    }

    public function getDosen()
    {
        return $this->dataDosen->nama;
    }
}