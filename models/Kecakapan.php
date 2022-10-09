<?php

namespace app\models;

use Yii;
use app\models\MataKuliah;

/**
 * This is the model class for table "kecakapan".
 *
 * @property string $id_kecakapan
 * @property string $kode_matkul
 * @property string $type_kecakapan
 */
class Kecakapan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kecakapan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kecakapan', 'kode_matkul', 'type_kecakapan'], 'required'],
            [['id_kecakapan', 'kode_matkul'], 'string', 'max' => 10],
            [['type_kecakapan'], 'string', 'max' => 100],
            [['id_kecakapan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kecakapan' => 'Id Kecakapan',
            'kode_matkul' => 'Kode Matkul',
            'type_kecakapan' => 'Type Kecakapan',
        ];
    }

    /**
     * {@inheritdoc}
     * @return KecakapanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KecakapanQuery(get_called_class());
    }

    public function getMataKuliah(){
        return $this->hasOne(MataKuliah::className(), ['kode' => 'kode_matkul']);
    }

    public function getMatkul(){
        return $this->mataKuliah->nama; 
    }
}
