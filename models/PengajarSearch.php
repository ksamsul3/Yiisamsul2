<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajar;

/**
 * PengajarSearch represents the model behind the search form of `app\models\Pengajar`.
 */
class PengajarSearch extends Pengajar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idkategori', 'tahun_lulus'], 'integer'],
            [['nip', 'nama', 'gender', 'tmp_lahir', 'tgl_lahir', 'alamat', 'hp', 'email', 'tgl_bergabung', 'pendidikan_terakhir', 'instansi_pendidikan', 'foto', 'cv'], 'safe'],
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
        $query = Pengajar::find();

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
            'idkategori' => $this->idkategori,
            'tgl_lahir' => $this->tgl_lahir,
            'tgl_bergabung' => $this->tgl_bergabung,
            'tahun_lulus' => $this->tahun_lulus,
        ]);

        $query->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'pendidikan_terakhir', $this->pendidikan_terakhir])
            ->andFilterWhere(['like', 'instansi_pendidikan', $this->instansi_pendidikan])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'cv', $this->cv]);

        return $dataProvider;
    }
}
