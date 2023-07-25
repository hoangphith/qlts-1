<?php

namespace app\modules\dungchung\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\modules\user\models\User;

class CustomFunc 
{    
    public function getTenTaiKhoan($userID){
        $model = User::findOne($userID);
        return $model!=NULL?$model->username:'';  
    }
    
    public function convertYMDHISToDMYHID($date_string){
        return $date_string!=null ? date("d/m/Y(H:i:s)", strtotime($date_string)) : '';
    }
    
    public function convertYMDToDMY($date_string){
        return $date_string!=null ? date("d/m/Y", strtotime($date_string)) : '';
    }
    
    public function convertDMYToYMD($date_string){
        if($date_string != null){
            $date_string = str_replace('/', '-', $date_string);
            return date("Y-m-d", strtotime($date_string));
        } else 
            return '';
    }
}