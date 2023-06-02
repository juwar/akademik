<?php

namespace app\models;

use Yii;
use app\models\Mahasiswa;

/**
 * This is the model class for table "refleksi".
 *
 * @property string $id_refleksi
 * @property string $nim
 * @property string $refleksi_pembimbing
 * @property string $kelemahan
 * @property string $kekurangan
 * @property string $pencapaian_akademik
 * @property string $pencapaian_non_akademik
 */
class Refleksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'refleksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_refleksi', 'nim', 'refleksi_pembimbing', 'kelemahan', 'kekurangan', 'pencapaian_akademik', 'pencapaian_non_akademik'], 'required'],
            [['id_refleksi'], 'string', 'max' => 10],
            [['nim'], 'string', 'max' => 20],
            [['refleksi_pembimbing'], 'string', 'max' => 500],
            [['kelemahan', 'kekurangan', 'pencapaian_akademik', 'pencapaian_non_akademik'], 'string', 'max' => 200],
            [['id_refleksi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_refleksi' => 'Id Refleksi',
            'nim' => 'Nim',
            'refleksi_pembimbing' => 'Refleksi Pembimbing',
            'kelemahan' => 'Kelemahan',
            'kekurangan' => 'Kekurangan',
            'pencapaian_akademik' => 'Pencapaian Akademik',
            'pencapaian_non_akademik' => 'Pencapaian Non Akademik',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RefleksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RefleksiQuery(get_called_class());
    }

    public function getDataMahasiswa(){
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
    }

    public function getMahasiswa(){
        return $this->dataMahasiswa->nama;
    }
}
