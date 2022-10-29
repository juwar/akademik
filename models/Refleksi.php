<?php

namespace app\models;

use Yii;
use app\models\Kecakapan;
use app\models\Mahasiswa;

/**
 * This is the model class for table "refleksi".
 *
 * @property int $id_refleksi
 * @property string $nim
 * @property string $id_kecakapan
 * @property string $refleksi_pembimbing
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
            [['id_refleksi', 'nim', 'id_kecakapan', 'refleksi_pembimbing'], 'required'],
            [['id_refleksi'], 'integer'],
            [['nim'], 'string', 'max' => 20],
            [['id_kecakapan'], 'string', 'max' => 10],
            [['refleksi_pembimbing'], 'string', 'max' => 500],
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
            'id_kecakapan' => 'Id Kecakapan',
            'refleksi_pembimbing' => 'Refleksi Pembimbing',
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

    public function getDataKecakapan(){
        return $this->hasOne(Kecakapan::className(), ['id_kecakapan' => 'id_kecakapan']);
    }

    public function getKecakapan(){
        // var_dump($this->dataKecakapan);die;
        return "A";
    }

    public function getMahasiswa(){
        return $this->hasOne(Mahasiswa::className(), ['nim' => 'nim']);
    }

    public function getUsername(){
        var_dump($this->mahasiswa);die;
        return $this->mahasiswa->nama; 
    }
}
