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
    public function rules()
    {
        return [
            [['id_refleksi', 'id_nilai'], 'integer'],
            [['id_kecakapan', 'refleksi_pembimbing'], 'safe'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_refleksi' => $this->id_refleksi,
            'id_nilai' => $this->id_nilai,
        ]);

        $query->andFilterWhere(['like', 'id_kecakapan', $this->id_kecakapan])
            ->andFilterWhere(['like', 'refleksi_pembimbing', $this->refleksi_pembimbing]);

        return $dataProvider;
    }
}
