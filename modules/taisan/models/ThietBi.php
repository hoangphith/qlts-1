<?php

namespace app\modules\taisan\models;

use Yii;

class ThietBi extends ThietBiBase{
    /**
     * hien thi url cua qr code
     * @return string
     */
    public function getQrCode(){
        return Yii::getAlias('@web') . $this::QR_FOLDER . $this->autoid . '.png';
    }
    
    /**
     * lay ten bo phan quan ly tu relation boPhanQuanLy
     * @return string
     */
    public function getTenBoPhanQuanLy(){
        return $this->boPhanQuanLy != NULL ? $this->boPhanQuanLy->ten_bo_phan : '';
    }
    
    /**
     * lay ten nhan vien tu relation nguoiQuanLy
     * @return string
     */
    public function getTenNguoiQuanLy(){
        return $this->nguoiQuanLy != NULL ? $this->nguoiQuanLy->ten_nhan_vien : '';
    }
    
    /**
     * lay ten loai thiet bi tu relation loaiThietBi
     * @return string
     */
    public function getTenLoaiThietBi(){
        return $this->loaiThietBi != NULL ? $this->loaiThietBi->ten_loai : '';
    }
    
    /**
     * lay ten vi tri tu relation viTri
     * @return string
     */
    public function getTenViTri(){
        return $this->viTri != NULL ? $this->viTri->ten_vi_tri : '';
    }
    
    /**
     * lay ten he thong tu relation heThong
     * @return string
     */
    public function getTenHeThong(){
        return $this->heThong != NULL ? $this->heThong->ten_he_thong : '';
    }
    
    /**
     * lay ten thiet bi cha tu relation thietBiCha
     * @return string
     */
    public function getTenThietBiCha(){
        return $this->thietBiCha != NULL ? $this->thietBiCha->ten_thiet_bi : '';
    }
}