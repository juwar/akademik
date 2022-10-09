<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kecakapan;

/**
 * KecakapanSearch represents the model behind the search form of `app\models\Kecakapan`.
 */
class KecakapanSearch extends Kecakapan
{
    /**
     * {@inheritdoc}
     */

    public $matkul;
    public function rules()
    {
        return [
            [['id_kecakapan', 'kode_matkul', 'type_kecakapan', 'matkul'], 'safe'],
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
        $query = Kecakapan::find();

        // add conditions that should always apply here
        $query->joinWith(['mataKuliah']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['matkul'] = [
            'asc' => ['matkul' => SORT_ASC],
            'desc' => ['matkul' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_kecakapan', $this->id_kecakapan])
            ->andFilterWhere(['like', 'kode_matkul', $this->kode_matkul])
            ->andFilterWhere(['like', 'mata_kuliah.nama', $this->matkul])
            ->andFilterWhere(['like', 'type_kecakapan', $this->type_kecakapan]);

        return $dataProvider;
    }
}
