<?php

namespace app\modules\dungchung\models;


class CheckFile
{  
    public $allowNull=true;//important
    public $isNumber;
    public $minLeng;
    public $maxLeng;
    public $error = '';
    public $isCompare;//1
    public $valueCompare = array();//1
    public $isDuplicate;//2
    public $modelDuplicate;//2
    public $isExist;//3
    public $modelExist;//3
    
    public function checkVal($custom, $value=NULL){
        if($this->allowNull == false){
            if($value==null){
                $this->error = $custom . ' không được để trống!';
            }
        }
        
        if($this->isNumber == true){
            
            if(!is_numeric($value)){
                if($value == null){
                    if($this->allowNull == false){
                        $this->error = $custom . ' phải là số!';
                    }
                }else {
                    $this->error = $custom . ' phải là số!';
                }
            }
        }
        
        if($this->isCompare == true){
            if(!in_array($value, $this->valueCompare)){
                if($this->allowNull == true){
                    if($value != NULL){
                        $this->error = $custom . ' không hợp lệ!';
                    }
                } else {
                    $this->error = $custom . ' không hợp lệ!';
                }
            }
        } 
        
        if($this->isDuplicate == true){
            if($this->modelDuplicate->count() > 0){
                $this->error = $custom . ' đã tồn tại!';
            }
        }
        
        if($this->isExist == true){
            if($this->modelExist->count() == 0 ){
                if($this->allowNull == true ){
                    if($value != NULL){
                        $this->error = $custom . ' Mã trực thuộc không tồn tại!';
                    }
                } else {
                    $this->error = $custom . ' Mã trực thuộc không tồn tại!';
                }
            }
        }
        
        
        return $this->error;
    }
}