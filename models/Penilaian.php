<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian".
 *
 * @property int $id
 * @property int $idpengajar
 * @property int $tahun
 * @property double $total
 * @property string $level
 *
 * @property Detailpenilaian[] $detailpenilaians
 * @property Pengajar $pengajar
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penilaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpengajar', 'tahun'], 'required'],
            [['idpengajar', 'tahun'], 'integer'],
            [['total'], 'number'],
            [['level'], 'string', 'max' => 5],
            [['idpengajar'], 'exist', 'skipOnError' => true, 'targetClass' => Pengajar::className(), 'targetAttribute' => ['idpengajar' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idpengajar' => 'idpengajar',
            'tahun' => 'Tahun',
            'total' => 'Total',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpenilaians()
    {
        return $this->hasMany(Detailpenilaian::className(), ['idpenilaian' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPengajar()
    {
        return $this->hasOne(Pengajar::className(), ['id' => 'idpengajar']);
    }
}
