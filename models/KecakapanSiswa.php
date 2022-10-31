<?php

namespace app\models;

use Yii;
use app\models\Kecakapan;
use app\models\Mahasiswa;

/**
 * This is the model class for table "kecakapan_siswa".
 *
 * @property string|null $id
 * @property string|null $id_kecakapan
 * @property string|null $nim
 */
class KecakapanSiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecakapan_siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_kecakapan'], 'string', 'max' => 10],
            [['nim'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kecakapan' => 'Id Kecakapan',
            'nim' => 'Nim',
        ];
    }

    /**
     * {@inheritdoc}
     * @return KecakapanSiswaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KecakapanSiswaQuery(get_called_class());
    }

    public function getDataKecakapan(){
        return $this->hasOne(Kecakapan::className(), ['id_kecakapan' => 'id_kecakapan']);
    }

    public function getKecakapan(){
        return $this->dataKecakapan;
    }

    public function getDataMahasiswa(){
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
    }

    public function getMahasiswa(){
        return $this->dataMahasiswa; 
    }
}
