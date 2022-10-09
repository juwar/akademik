<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nilai;

/**
 * NilaiSearch represents the model behind the search form of `app\models\Nilai`.
 */
class NilaiSearch extends Nilai
{
    /**
     * {@inheritdoc}
     */
    public $matkul;
    public $username;
    public function rules()
    {
        return [
            [['id_nilai', 'semester', 'bobot_nilai'], 'integer'],
            [['nim', 'kode_matkul', 'nilai', 'matkul', 'username'], 'safe'],
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
    public function search($params)
    {
        $query = Nilai::find();

        // add conditions that should always apply here
        $query->joinWith(['mataKuliah']);
        $query->joinWith(['mahasiswa']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['matkul'] = [
            'asc' => ['mata_kuliah.nama' => SORT_ASC],
            'desc' => ['mata_kuliah.nama' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['username'] = [
            'asc' => ['mata_kuliah.nama' => SORT_ASC],
            'desc' => ['mata_kuliah.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_nilai' => $this->id_nilai,
            'semester' => $this->semester,
            'bobot_nilai' => $this->bobot_nilai,
        ]);

        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'kode_matkul', $this->kode_matkul])
            ->andFilterWhere(['like', 'mata_kuliah.nama', $this->matkul])
            ->andFilterWhere(['like', 'mahasiswa.nama', $this->username])
            ->andFilterWhere(['like', 'nilai', $this->nilai]);

        return $dataProvider;
    }
}
