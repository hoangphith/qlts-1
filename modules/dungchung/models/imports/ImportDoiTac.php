<?php

namespace app\modules\dungchung\models\imports;

use app\modules\bophan\models\BoPhan;
use app\modules\dungchung\models\CheckFile;
use app\modules\dungchung\models\Import;
use app\modules\bophan\models\NhomDoiTac;

class ImportDoiTac
{    
    CONST START_ROW = 3;
    CONST START_COL = 'B';
    
    /**
     * kiem tra file upload
     * @param string $type
     * @param string $file : filename
     * @return array[]
     */
    public static function checkFile($type, $file){
        $xls_data = Import::readExcelToArr($file);
        
        $errors = array();
        $errorByRow = array();
        
        foreach ($xls_data as $index=>$row){
            $errorByRow = array();
            if($index>=ImportDoiTac::START_ROW){
                //check B <id_nhom_doi_tac> exist and not null
                $mod = new CheckFile();
                $mod->isExist = true;
                $mod->allowNull = false;
                $mod->modelExist = NhomDoiTac::find()->where(['ma_loai'=>$row['E']]);
                $err = $mod->checkVal('E'.$index, $row['E']);
                if(!empty($err)){
                    array_push($errorByRow, $err);
                }
            }
            if($errorByRow != null){
                //array_push($errors, $errorByRow);
                $errors[$index] = $errorByRow;
            }
        }        
        return $errors;
    }
    
    /**
     * import file đã kiểm tra vào csdl
     * @param string $file: ten file
     * @return number[]|string[][]
     */
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