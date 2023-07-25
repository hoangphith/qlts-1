<?php

namespace app\modules\bophan\models;

use Yii;
use app\modules\dungchung\models\CustomFunc;

class NhanVien extends \app\modules\bophan\models\NhanVienBase
{
    /**
     * hien thi ngay vao lam dd/mm/yyyy
     * @return string
     */
    public function getNgayVaoLam(){
        $cus = new CustomFunc();
        return $cus->convertYMDToDMY($this->ngay_vao_lam);
    }
    
    /**
     * hien thi ngay thoi viec dd/mm/yyyy
     * @return string
     */
    public function getNgayThoiViec(){
        $cus = new CustomFunc();
        return $cus->convertYMDToDMY($this->ngay_thoi_viec);
    }
    
    /**
     * hien thi ten bo phan cua nhan vien
     * @return string
     */
    public function getTenBoPhan(){
        return $this->boPhan->ten_bo_phan;
    }
    
    /**
     * hien thi gioi tinh cua nhan vien
     * @return string
     */
    public function getGioiTinh(){
        return $this::getGioiTinhLabel($this->gioi_tinh);
    }
}