<?php

namespace app\modules\bophan\models;

use Yii;

class DoiTac extends DoiTacBase
{
    /**
     * lay ten nhom doi tac qua relation
     * @return string
     */
    public function getTenNhomDoiTac(){
        return $this->nhomDoiTac->ten_nhom;
    }
    
}