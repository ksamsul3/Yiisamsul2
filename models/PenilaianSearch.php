<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\penilaian;

/**
 * PenilaianSearch represents the model behind the search form of `app\models\penilaian`.
 */
class PenilaianSearch extends penilaian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idpengajar', 'tahun'], 'integer'],
            [['total'], 'number'],
            [['level'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = penilaian::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             //setting paging
            'pagination' => ['pageSize'=>5],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idpengajar' => $this->idpengajar,
            'tahun' => $this->tahun,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'level', $this->level]);

        return $dataProvider;
    }
}
