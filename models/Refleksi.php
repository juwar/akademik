<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refleksi".
 *
 * @property int $id_refleksi
 * @property int $id_nilai
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
            [['id_refleksi', 'id_nilai', 'id_kecakapan', 'refleksi_pembimbing'], 'required'],
            [['id_refleksi', 'id_nilai'], 'integer'],
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
            'id_nilai' => 'Id Nilai',
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
}
