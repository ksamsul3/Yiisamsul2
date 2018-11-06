<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kriteriapoint".
 *
 * @property int $id
 * @property int $idkriteria
 * @property string $deskripsi
 * @property double $point
 * @property int $tahun
 *
 * @property Detailpenilaian[] $detailpenilaians
 * @property Kriteria $kriteria
 */
class Kriteriapoint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kriteriapoint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idkriteria', 'deskripsi', 'point'], 'required'],
            [['idkriteria', 'tahun'], 'integer'],
            [['deskripsi'], 'string'],
            [['point'], 'number'],
            [['idkriteria'], 'exist', 'skipOnError' => true, 'targetClass' => Kriteria::className(), 'targetAttribute' => ['idkriteria' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idkriteria' => 'Kriteria',
            'deskripsi' => 'Deskripsi',
            'point' => 'Point',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpenilaians()
    {
        return $this->hasMany(Detailpenilaian::className(), ['idkriteriaPoint' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelasiKriteria()
    {
        return $this->hasOne(Kriteria::className(), ['id' => 'idkriteria']);
    }
}
