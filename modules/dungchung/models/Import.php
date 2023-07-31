<?php
namespace app\modules\dungchung\models;

use Yii;
use yii\base\Model;

class Import extends Model
{
    CONST FOLDER_EXCEL_UP = '/uploads/excel/up/';
    public $file;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'file' => 'File import',
        ];
    }
    
    public static function checkFileExist($file){
        $fxls = Yii::getAlias('@webroot') . Import::FOLDER_EXCEL_UP . $file;
        if(file_exists($fxls)){
            return true;
        } else {
            return false;
        }
    }
    
    public static function deleteFileTemp($file){
        $fxls = Yii::getAlias('@webroot') . Import::FOLDER_EXCEL_UP . $file;
        if(file_exists($fxls)){
            unlink($fxls);
        }
    }
    
    public static function readExcel($file){
        $fxls = Yii::getAlias('@webroot') . Import::FOLDER_EXCEL_UP . $file;
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fxls);
        //read excel data and store it into an array and return
        return $spreadsheet;
    }
    
    public static function readExcelToArr($file){
        $spreadsheet = Import::readExcel($file);
        return $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    }
    
    public static function readExcelColsToArr($file, $range){
        $spreadsheet = Import::readExcel($file);
        return $spreadsheet->getActiveSheet()->rangeToArray($range);
    }
    
    /**
     * convert data colums range in excel to simle array
     * exam: [0=>[0=>a], 1=>[0=>b],] => [a,b,..]
     * @param array $dataArr
     * @return array
     */
    public static function convertColsToSimpleArr($dataArr){
        $list = array();
        foreach ($dataArr as $val){
            if($val[0] != null){
                $list[] = $val[0];
            }
        }
        return $list;
    }
    
    /**
     * convert data column range in excel to sql string "IN" with col name and list
     * exam: "ma_bo_phan IN ('ma1', 'ma2')"
     * @param array $dataArr
     * @param string $colInBb
     * @param bool $isNum
     * @return string
     */
   /*  public static function convertColsToSqlStr($dataArr, $colInBb, $isNum){
        $list = Import::convertColsToSimpleArr($dataArr);
        
        if(!empty($list)){
            if($isNum == true){
                $string = implode(',', $list);
                return $colInBb . ' IN (' . $string . ')';
            } else {
                $string = implode("','", $list);
                return $colInBb . " IN ('" . $string . "')";
            }
        } else 
            return '';
    } */
    
}
