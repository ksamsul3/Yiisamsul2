<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KriteriaPoint;

/**
 * KriteriaPointSearch represents the model behind the search form of `app\models\KriteriaPoint`.
 */
class KriteriaPointSearch extends KriteriaPoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idkriteria', 'tahun'], 'integer'],
            [['deskripsi'], 'safe'],
            [['point'], 'number'],
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
        $query = KriteriaPoint::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //setting paging
            'pagination' => ['pageSize'=>10],
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
            'idkriteria' => $this->idkriteria,
            'point' => $this->point,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider; 
    }
}
