<?php

namespace app\models;

use Yii;
use app\models\MataKuliah;
use app\models\Mahasiswa;

/**
 * This is the model class for table "nilai".
 *
 * @property int $id_nilai
 * @property string $nim
 * @property string $kode_matkul
 * @property int $semester
 * @property string $nilai
 * @property int $bobot_nilai
 */
class Nilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'kode_matkul', 'semester', 'nilai', 'bobot_nilai'], 'required'],
            [['semester', 'bobot_nilai'], 'integer'],
            [['nim'], 'string', 'max' => 20],
            [['kode_matkul'], 'string', 'max' => 10],
            ['nilai', 'each', 'rule' => ['string']],
            // [['nilai'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nilai' => 'Id Nilai',
            'nim' => 'Nim',
            'kode_matkul' => 'Kode Matkul',
            'semester' => 'Semester',
            'nilai' => 'Nilai',
            'bobot_nilai' => 'Bobot Nilai',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NilaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NilaiQuery(get_called_class());
    }

    public function getMataKuliah()
    {
        return $this->hasOne(MataKuliah::className(), ['kode' => 'kode_matkul']);
    }

    public function getMatkul()
    {
        return $this->mataKuliah->nama;
    }

    public function getMahasiswa()
    {
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
    }

    public function getUsername()
    {
        return $this->mahasiswa->nama;
    }
}
