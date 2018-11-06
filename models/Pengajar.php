<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Pengajar}}".
 *
 * @property int $id
 * @property string $nip
 * @property string $nama
 * @property int $idkategori
 * @property string $gender
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $hp
 * @property string $email
 * @property string $tgl_bergabung
 * @property string $pendidikan_terakhir
 * @property int $tahun_lulus
 * @property string $instansi_pendidikan
 * @property string $foto
 * @property string $cv
 */
class pengajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    //buat var baru untuk simpan file
    public $fotoFile;
    public $cvFile;

    public static function tableName()
    {
        return 'Pengajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'idkategori', 'gender', 'tmp_lahir', 'tgl_lahir', 'alamat', 'hp', 'email', 'pendidikan_terakhir'], 'required'],
            [['idkategori', 'tahun_lulus'], 'integer'],
            [['gender', 'alamat'], 'string'],
            [['tgl_lahir', 'tgl_bergabung'], 'safe'],
            [['nip', 'nama', 'tmp_lahir', 'email', 'pendidikan_terakhir', 'instansi_pendidikan', 'foto', 'cv'], 'string', 'max' => 45],
            [['hp'], 'string', 'max' => 15],
            [['nip'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['idkategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['idkategori' => 'id']],
            //tambahan untuk upload file
            [['fotoFile'], 'file',
                'skipOnEmpty' => true, 
                'extensions' => 'png,jpg,jpeg,gif',
                'maxSize' => 2048000,//max 2000 KB = 2048000 Bytes
                'minSize' => 102400,//min 100 KB = 120400 Bytes

            ],
            [['cvFile'], 'file',
                'skipOnEmpty' => true, 
                'extensions' => 'doc,docx,pdf,odt',
                'maxSize' => 5120000,//max 5000 KB = 5120000 Bytes
                'minSize' => 20480,//min 20 KB = 20480 Bytes

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'nama' => 'Pengajar',
            'idkategori' => 'Kategori',
            'gender' => 'Jenis Kelamian',
            'tmp_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'hp' => 'Hp',
            'email' => 'Email',
            'tgl_bergabung' => 'Tanggal Bergabung',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'tahun_lulus' => 'Tahun Lulus',
            'instansi_pendidikan' => 'Instansi Pendidikan',
            'foto' => 'Foto',
            'cv' => 'CV',
            'fotoFile' => 'File Foto',
            'cvFile' => 'Dokumen CV',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelasiKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'idkategori']);
    }

}
