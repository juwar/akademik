<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mahasiswa;

/**
 * MahasiswaSearch represents the model behind the search form of `app\models\Mahasiswa`.
 */
class MahasiswaSearch extends Mahasiswa
{
    /**
     * {@inheritdoc}
     */
    public $dosen;
    public function rules()
    {
        return [
            [['nim', 'nama', 'prodi', 'id_dosen', 'telpon', 'alamat', 'dosen'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $id = null)
    {
        $query = $id !== null ? Mahasiswa::find()->andFilterWhere(['like', 'mahasiswa.id_dosen', $id]) : Mahasiswa::find();

        // add conditions that should always apply here
        $query->joinWith(['dataDosen']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['dosen'] = [
            'asc' => ['dosen.nama' => SORT_ASC],
            'desc' => ['dosen.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'mahasiswa.nama', $this->nama])
            ->andFilterWhere(['like', 'mahasiswa.prodi', $this->prodi])
            ->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'telpon', $this->telpon])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'dosen.nama', $this->dosen]);
        ;

        return $dataProvider;
    }
}