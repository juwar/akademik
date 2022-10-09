<?php

namespace app\models;

use Yii;

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
            [['nilai'], 'string', 'max' => 3],
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
}
