<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KecakapanSiswa;

/**
 * KecakapanSiswaSearch represents the model behind the search form of `app\models\KecakapanSiswa`.
 */
class KecakapanSiswaSearch extends KecakapanSiswa
{
    /**
     * {@inheritdoc}
     */
    public $kecakapan;
    public $mahasiswa;
    public function rules()
    {
        return [
            [['id', 'id_kecakapan', 'nim', 'kecakapan', 'mahasiswa'], 'safe'],
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
        $query = KecakapanSiswa::find();

        // add conditions that should always apply here
        $query->joinWith(['dataKecakapan']);
        $query->joinWith(['dataMahasiswa']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['kecakapan'] = [
            'asc' => ['kecakapan.type_kecakapan' => SORT_ASC],
            'desc' => ['kecakapan.type_kecakapan' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['mahasiswa'] = [
            'asc' => ['mahasiswa.nama' => SORT_ASC],
            'desc' => ['mahasiswa.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'id_kecakapan', $this->id_kecakapan])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'kecakapan.type_kecakapan', $this->kecakapan])
            ->andFilterWhere(['like', 'mahasiswa.nama', $this->mahasiswa]);

        return $dataProvider;
    }
}
