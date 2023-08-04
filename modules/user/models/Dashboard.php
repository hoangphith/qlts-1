<?php
namespace app\modules\user\models;

use app\modules\taisan\models\ThietBi;
use app\modules\taisan\models\LoaiThietBi;

class Dashboard{
    /**
     * sum so luong tai san dang hoat dong
     * @return number|string|NULL
     */
    public function getSumTaiSanDangHoatDong(){
       return ThietBi::find()->where([
           'trang_thai'=>ThietBi::STATUS_HOATDONG
       ])->count();
    }
    
    /**
     * get so luong dang hoat dong theo loai thiet bi
     * @param string $type
     * @return number|string|NULL
     */
    public function getSumLoaiThietBiDangHoatDong($type){
        return ThietBi::find()->alias('t')->joinWith([
            'loaiThietBi as ltb'
        ])->where([
            'ltb.loai_thiet_bi'=>$type,
            't.trang_thai'=>ThietBi::STATUS_HOATDONG
        ])->count();
    }
    
    /**
     * 
     * @return array
     */
    public function getListTaiSanPercent(){
        $arr = array();
        
        
        
        return [
            ['label'=>'Đang hoạt động', 'sum'=>50, 'percent'=>50/100*100 . '%'],
            ['label'=>'Đang sửa chữa', 'sum'=>25, 'percent'=>25/100*100 . '%'],
            ['label'=>'Đã hỏng', 'sum'=>25, 'percent'=>25/100*100 . '%'],
        ];
    }
}