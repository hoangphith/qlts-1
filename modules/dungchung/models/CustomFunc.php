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
        return date("d/m/Y(H:i:s)", strtotime($date_string));
    }
}