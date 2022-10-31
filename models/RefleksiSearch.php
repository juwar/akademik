<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Refleksi;

/**
 * RefleksiSearch represents the model behind the search form of `app\models\Refleksi`.
 */
class RefleksiSearch extends Refleksi
{
    /**
     * {@inheritdoc}
     */
    public $mahasiswa;
    public function rules()
    {
        return [
            [['id_refleksi', 'nim', 'refleksi_pembimbing', 'mahasiswa'], 'safe'],
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
        $query = Refleksi::find();

        // add conditions that should always apply here
        $query->joinWith(['dataMahasiswa']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
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
        $query->andFilterWhere(['like', 'id_refleksi', $this->id_refleksi])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'refleksi_pembimbing', $this->refleksi_pembimbing])
            ->andFilterWhere(['like', 'mahasiswa.nama', $this->mahasiswa]);

        return $dataProvider;
    }
}
