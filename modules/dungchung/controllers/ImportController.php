<?php

namespace app\modules\dungchung\controllers;

use app\modules\bophan\models\BoPhan;
use app\modules\bophan\models\NhanVien;
use app\modules\dungchung\models\Import;
use app\modules\dungchung\models\imports\ImportBoPhan;
use app\modules\dungchung\models\imports\ImportNhanVien;
use app\modules\dungchung\models\imports\ImportThietBi;
use app\modules\taisan\models\ThietBi;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Default controller for the `dungchung` module
 */
class ImportController extends Controller
{
     /**
     * Upload file to import
     * @param string $type
     * @return mixed
     */
    public function actionUpload($type)
    {   
        $model = new Import();
        $request = Yii::$app->request;
        
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                
                return [
                    'title'=> "Upload file",
                    'content'=>$this->renderAjax('upload', compact('model')),
                    'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                    Html::button('Tải lên',['class'=>'btn btn-primary','type'=>"submit"])
                    
                ];
            }else if($model->load($request->post())){
                $file = UploadedFile::getInstance($model, 'file');
                if (!empty($file)){
                    /* $model->ten_file_luu = $file->name;
                    $model->file_extension = $file->extension;
                    $model->file_size = $file->size; */
                    $fileName = md5(Yii::$app->user->id . date('Y-m-d H:i:s')) . '.' . $file->extension;
                    $file->saveAs(Yii::getAlias('@webroot') . Import::FOLDER_EXCEL_UP .  $fileName);
                
                    /* return [
                        'title'=> "Test file dữ liệu",
                        'content'=>'<span class="text-success">Upload thành công!</span>',
                        'tcontent'=>'Upload thành công! Vui lòng kiểm tra dữ liệu',
                        'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                        Html::a('Kiểm tra dữ liệu',['check?type='.$type.'&file=' . $fileName],['class'=>'btn btn-primary','role'=>'modal-remote'])
                        
                    ]; */
                    
                    //checkfile
                    if($type==ThietBi::MODEL_ID){
                        $rt = ImportThietBi::checkFile($type, $fileName);
                    } else if($type==BoPhan::MODEL_ID){
                        $rt = ImportBoPhan::checkFile($type, $fileName);
                    } else if ($type == NhanVien::MODEL_ID){
                        $rt = ImportNhanVien::checkFile($type, $fileName);
                    }
                    
                    $status = false;
                    if(empty($rt)){
                        $status = true;
                    }
                    if($status == true){
                        return [
                            'title'=> "Kiểm tra file dữ liệu",
                            'content'=>$this->renderAjax('checkSuccess'),
                            //'tcontent'=>'Upload thành công! Vui lòng kiểm tra dữ liệu',
                            'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                            Html::a('Tiến hành upload',['import?type='.$type.'&file=' . $fileName],['class'=>'btn btn-primary','role'=>'modal-remote'])
                            
                        ];
                    } else {
                        Import::deleteFileTemp($fileName);
                        return [
                            'title'=> "Test file dữ liệu",
                            'content'=>$this->renderAjax('error', compact('rt')),
                            //'content'=>'<span class="text-success">File lỗi! ' .print_r($rt). '</span>',
                            //'tcontent'=>'Upload thành công! Vui lòng kiểm tra dữ liệu',
                            'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"])
                            
                        ];
                    }
                    
                    
                }
            }
        }
    }
    
    public function actionImport($type, $file){
        $request = Yii::$app->request;
        
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                if(Import::checkFileExist($file)){
                    
                    if($type==ThietBi::MODEL_ID){
                        $result = ImportThietBi::importFile($file);
                    } else if($type==BoPhan::MODEL_ID){
                        $result = ImportBoPhan::importFile($file);
                    } else if ($type == NhanVien::MODEL_ID){
                        $result = ImportNhanVien::importFile($file);
                    }
                    
                    Import::deleteFileTemp($file);
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Kết quả import dữ liệu",
                        'content'=>$this->renderAjax('result', [
                            'success'=>$result['success'],
                            'error'=>$result['error'],
                            'errorArr'=>$result['errorArr']
                        ]),
                        //'tcontent'=>'Upload thành công! Vui lòng kiểm tra dữ liệu',
                        'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"])
                        
                    ];
                }
            }
        }
    }
    
    
    /**
     * check file to import
     * @param string $file
     * @return mixed
     */
    /* public function actionCheck($type,$file)
    {    
        Yii::$app->response->format = Response::FORMAT_JSON;        
        
        $rt = ImportBoPhan::checkFile($type, $file);
        
        $status = false;
        if(empty($rt)){
            $status = true;
        }
        if($status == true){
            return [
                'title'=> "Test file dữ liệu",
                'content'=>'<span class="text-success">Kiểm tra ok!!</span>',
                //'tcontent'=>'Upload thành công! Vui lòng kiểm tra dữ liệu',
                'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"]).
                Html::a('Tiến hành upload',['upload?type='.$type.'&file=' . $file],['class'=>'btn btn-primary','role'=>'modal-remote'])
                
            ];
        } else {
            return [
                'title'=> "Test file dữ liệu",
                'content'=>'<span class="text-success">File lỗi! ' .print_r($rt). '</span>',
                //'tcontent'=>'Upload thành công! Vui lòng kiểm tra dữ liệu',
                'footer'=> Html::button('Đóng lại',['class'=>'btn btn-default pull-left','data-bs-dismiss'=>"modal"])
                
            ];
        }
    } */
}
