<?php

namespace app\modules\dungchung\models;

use Yii;

class History extends HistoryBase
{
    /**
     * save history
     */
    public static function addHistory($type, $atr, $mod, $isNew){
        $noiDung = '';
        if($isNew == false){
            foreach ($atr as $key=>$value){
                if($atr[$key] != $mod->$key){
                    $noiDung .= '<p>Thay đổi '. $mod->getAttributeLabel($key) .' "'. $value . '" thành "'. $mod->$key . '"</p>';
                }
            }
        } else {
            $noiDung = 'Thực hiện thêm mới dữ liệu thành công.';
        }
        
        //$his->noi_dung = var_dump($changedAttributes);
        if($noiDung != null){
            $his = new History();
            $his->loai = $type;
            $his->id_tham_chieu = $mod->id;
            $his->noi_dung = $noiDung;
            $his->save();
        }
    }
}
