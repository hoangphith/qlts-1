<?php

namespace app\modules\dungchung\models\imports;

use app\modules\bophan\models\BoPhan;
use app\modules\dungchung\models\CheckFile;
use app\modules\dungchung\models\Import;
use app\modules\taisan\models\ThietBi;
use app\modules\taisan\models\ViTri;
use app\modules\taisan\models\HeThong;
use app\modules\taisan\models\LoaiThietBi;

class ImportThietBi
{    
    CONST START_ROW = 4;
    CONST START_COL = 'B';
    
    public static function checkFile($type, $file){
        $xls_data = Import::readExcelToArr($file);
        
        $errors = array();
        $errorByRow = array();
        
        $listExist = array();
        
        foreach ($xls_data as $index=>$row){
            $errorByRow = array();
            if($index>=ImportThietBi::START_ROW){
                
                //check B <ma_thiet_bi> is not null and not duplicate                
                $mod = new CheckFile();
                $mod->isDuplicate = true;
                //$mod->allowNull = true;
                $mod->modelDuplicate = ThietBi::find()->where(['ma_thiet_bi'=>$row['B']]);
                $err = $mod->checkVal('B'.$index, $row['B']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                } else {
                    $bArr = Import::readExcelColsToArr($file, 'B'. ImportThietBi::START_ROW .':B'.($index-1));
                    if(!empty($bArr)){
                        $bArrSimple = Import::convertColsToSimpleArr($bArr);
                        if(in_array($row['B'], $bArrSimple)){
                            array_push($errorByRow, 'B'.$index . ' đã tồn tại!');
                        }
                    }               
                }
                
                //check C <id_vi_tri> exist if not null
                $mod = new CheckFile();
                $mod->isExist = true;
                $mod->allowNull = true;
                $mod->modelExist = ViTri::find()->where(['ma_vi_tri'=>$row['C']]);
                $err = $mod->checkVal('C'.$index, $row['C']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }
                
                //check D <id_he_thong> exist if not null
                $mod = new CheckFile();
                $mod->isExist = true;
                $mod->allowNull = true;
                $mod->modelExist = HeThong::find()->where(['ma_he_thong'=>$row['D']]);
                $err = $mod->checkVal('D'.$index, $row['D']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }
                
                //check E <id_loai_thiet_bi> exist if not null
                $mod = new CheckFile();
                $mod->isExist = true;
                $mod->allowNull = false;
                $mod->modelExist = LoaiThietBi::find()->where(['ma_loai'=>$row['E']]);
                $err = $mod->checkVal('E'.$index, $row['E']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }
                
                //check F <id_bo_phan_quan_ly> exist if not null
                $mod = new CheckFile();
                $mod->isExist = true;
                $mod->allowNull = false;
                $mod->modelExist = BoPhan::find()->where(['ma_bo_phan'=>$row['F']]);
                $err = $mod->checkVal('F'.$index, $row['F']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }
                
                //check G <ten_thiet_bi>, not null
                $mod = new CheckFile();
                $mod->allowNull = false;
                $err = $mod->checkVal('G'.$index, $row['G']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }
                
                //check H = x or X
                $mod = new CheckFile();
                $mod->isCompare = true;
                $mod->valueCompare = ['x', 'X'];
                $err = $mod->checkVal('H'.$index, $row['H']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                } 
                
                
                
              
                
              /*   //check E exist
                $doCheckE = true;
                if($row['E'] != null){
                    $bArr = Import::readExcelColsToArr($file, 'B'. ImportThietBi::START_ROW .':B'.($index-1));
                    if(!empty($bArr)){
                        $bArrSimple = Import::convertColsToSimpleArr($bArr);
                        if(in_array($row['E'], $bArrSimple)){
                            $doCheckE = false;
                        }
                    }               
                }                
                if($doCheckE == true){
                    $mod = new CheckFile();
                    $mod->isExist = true;
                    $mod->allowNull = true;
                    $mod->modelExist = BoPhan::find()->where(['ma_bo_phan'=>$row['E']]);              
                    $err = $mod->checkVal('E'.$index, $row['E']);
                    if(!empty($err)){
                        array_push($errorByRow, $err);
                    }
                }
                
                //check F = x or X
                $mod = new CheckFile();
                $mod->isCompare = true;
                $mod->valueCompare = ['x', 'X'];
                $err = $mod->checkVal('F'.$index, $row['F']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }  */  
                
            }
            if($errorByRow != null){
                //array_push($errors, $errorByRow);
                $errors[$index] = $errorByRow;
            }
        }        
        return $errors;
    }
    
    public static function importFile($file){
        $xls_data = Import::readExcelToArr($file);
        $errorByRow = array();
        $successCount = 0;
        $errorCount = 0;
        foreach ($xls_data as $index=>$row){
            if($index>=ImportBoPhan::START_ROW){
                $model = new BoPhan();
                $model->ma_bo_phan = $row['B'];
                $model->ten_bo_phan = $row['C'];
                if($row['E']!=NULL){
                    $model->truc_thuoc = BoPhan::findOne(['ma_bo_phan'=>$row['E']])->id;
                }
                $model->la_dv_quan_ly = strtolower($row['F'])=='x'?1:0;
                $model->la_dv_su_dung = strtolower($row['G'])=='x'?1:0;
                $model->la_dv_bao_tri = strtolower($row['H'])=='x'?1:0;
                $model->la_dv_van_tai = strtolower($row['I'])=='x'?1:0;
                $model->la_dv_mua_hang = strtolower($row['J'])=='x'?1:0;
                $model->la_dv_quan_ly_kho = strtolower($row['K'])=='x'?1:0;
                $model->la_trung_tam_chi_phi = strtolower($row['L'])=='x'?1:0;
                if($model->save()){
                    $successCount++;
                } else {
                    $errorCount++;
                    $errorByRow[$index] = 'Dòng '. $index . ' bị lỗi!';
                }
            }
        }
        return [
            'success'=>$successCount,
            'error'=>$errorCount,
            'errorArr'=>$errorByRow,
        ];
    }
}