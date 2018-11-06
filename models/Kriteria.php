<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kriteria".
 *
 * @property int $id
 * @property string $nama
 * @property double $bobot
 *
 * @property Kriteriapoint[] $kriteriapoints
 */
class Kriteria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kriteria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'bobot'], 'required'],
            [['bobot'], 'number'],
            [['nama'], 'string', 'max' => 45],
            [['nama'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'bobot' => 'Bobot',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKriteriapoints()
    {
        return $this->hasMany(Kriteriapoint::className(), ['idkriteria' => 'id']);
    }
}
