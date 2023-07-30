<?php

namespace app\modules\taisan\models;

use Yii;

class LoaiThietBi extends LoaiThietBiBase{
    /**
     * lay tat ca loai thiet bi
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getDanhSach(){
        return LoaiThietBi::find()->all();
    }
}