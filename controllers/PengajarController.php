<?php

namespace app\controllers;

use Yii;
use app\models\Pengajar;
use app\models\PengajarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * PengajarController implements the CRUD actions for Pengajar model.
 */
class PengajarController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pengajar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengajar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pengajar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        $model = new Pengajar();

        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    */
    /**
     * Updates an existing Pengajar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    */
    //----------------------awal proses upload file-----------------------------
    public function actionCreate()
    {
        $model = new Pengajar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Menambahkan Action Upload file
            $model->fotoFile = UploadedFile::getInstance($model, 'fotoFile');
            $model->cvFile = UploadedFile::getInstance($model, 'cvFile');
            if ($model->validate() && !empty($model->fotoFile) && !empty($model->cvFile)) {
                // $nama = $model->fotoFile->baseName . '.' . $model->fotoFile->extension; 
                $nama1 = $model->nip.'-'.date('jnY').'.'. $model->fotoFile->extension;   
                $nama2 = $model->nip.'.'. $model->cvFile->extension;  
                $model->foto = $nama1;  // simpan nama file   
                $model->cv = $nama2;  // simpan nama file
                $model->save(); // simpan semua data beserta nama file     
                $model->fotoFile->saveAs('foto/' .$nama1); // simpan fisik file
                $model->cvFile->saveAs('cv/' .$nama2); // simpan fisik file
            }
            else if ($model->validate() && empty($model->fotoFile) && !empty($model->cvFile)) {
                $nama2 = $model->nip.'.'. $model->cvFile->extension;  
                $model->cv = $nama2;  // simpan nama file
                $model->save(); // simpan semua data beserta nama file     
                $model->cvFile->saveAs('cv/' .$nama2); // simpan fisik file
            }
            else if ($model->validate() && !empty($model->fotoFile) && empty($model->cvFile)) {
                $nama1 = $model->nip.'-'.date('jnY').'.'. $model->fotoFile->extension;   
                $model->foto = $nama1;  // simpan nama file
                $model->save(); // simpan semua data beserta nama file     
                $model->fotoFile->saveAs('foto/' .$nama1); // simpan fisik file
            }
            else{
                $model->save(); // simpan data pegawai tanpa file foto dan file cv       
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else{
            return $this->render('create', [
                'model' => $model,
            ]);
            
        }
        
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                // Menambahkan Action Upload file
            $model->fotoFile = UploadedFile::getInstance($model, 'fotoFile');
            $model->cvFile = UploadedFile::getInstance($model, 'cvFile');
            if ($model->validate() && !empty($model->fotoFile) && !empty($model->cvFile)) {
                    // $nama = $model->fotoFile->baseName . '.' . $model->fotoFile->extension; 
                $nama1 = $model->nip.'-'.date('jnY').'.'. $model->fotoFile->extension;   
                $nama2 = $model->nip.'.'. $model->cvFile->extension;  
                    $model->foto = $nama1;  // simpan nama file   
                    $model->cv = $nama2;  // simpan nama file
                    $model->save(); // simpan semua data beserta nama file     
                    $model->fotoFile->saveAs('foto/' .$nama1); // simpan fisik file
                    $model->cvFile->saveAs('cv/' .$nama2); // simpan fisik file
                }
                else if ($model->validate() && empty($model->fotoFile) && !empty($model->cvFile)) {
                    $nama2 = $model->nip.'.'. $model->cvFile->extension;  
                    $model->cv = $nama2;  // simpan nama file
                    $model->save(); // simpan semua data beserta nama file     
                    $model->cvFile->saveAs('cv/' .$nama2); // simpan fisik file
                }
                else if ($model->validate() && !empty($model->fotoFile) && empty($model->cvFile)) {
                    $nama1 = $model->nip.'-'.date('jnY').'.'. $model->fotoFile->extension;   
                    $model->foto = $nama1;  // simpan nama file
                    $model->save(); // simpan semua data beserta nama file     
                    $model->fotoFile->saveAs('foto/' .$nama1); // simpan fisik file
                }
                else{
                    $model->save(); // simpan data pegawai tanpa file foto        
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } 
            else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }

    //----------------------akhir proses upload file----------------------------
    /**
     * Deletes an existing Pengajar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengajar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengajar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengajar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportPdfPengajar()
    {
        $searchModel = new PengajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $html = $this->renderPartial('pdfPengajar',['dataProvider'=>$dataProvider]);
        $mpdf=new \mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);  
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
        $mpdf->WriteHTML($html);
        $mpdf->Output();
        exit;
    }

    public function actionExportExcelPengajar()
    {
        $searchModel = new PengajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        // Initalize the TBS instance
        $OpenTBS = new \hscstudio\export\OpenTBS; // new instance of TBS
        // Change with Your template kaka
        $template = Yii::getAlias('@hscstudio/export').'/templates/opentbs/excelPengajar.xlsx';
        $OpenTBS->LoadTemplate($template); // Also merge some [onload] automatic fields (depends of the type of document).
        //$OpenTBS->VarRef['modelName']= "Mahasiswa";               
        $data = [];
        $no=1;
        foreach($dataProvider->getModels() as $peng){
            $data[] = [
                'no'=>$no++,
                'nip'=>$peng->nip,
                'nama'=>$peng->nama,
                'kategori'=>$peng->relasiKategori->nama,
                'alamat'=>$peng->alamat,
                'hp'=>$peng->hp,
                'email'=>$peng->email,

            ];
        }
        
       
        
        $OpenTBS->MergeBlock('data', $data);
        // Output the result as a file on the server. You can change output file
        $OpenTBS->Show(OPENTBS_DOWNLOAD, 'dataPengajar-'.date('j-m-Y-H:i:s').'.xlsx'); // Also merges all [onshow] automatic fields.          
        exit;
    } 

}
