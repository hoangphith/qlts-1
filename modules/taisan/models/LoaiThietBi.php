<?php

namespace app\modules\taisan\models;

use Yii;

class LoaiThietBi extends LoaiThietBiBase{
    
    public $arr;//use in getListTree
    public $parr;//use in getListTree
    
    /**
     * lay tat ca loai thiet bi
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getDanhSach(){
        return LoaiThietBi::find()->all();
    }
    
    /**
     * lay thong tin loai thiet bi truc thuoc
     * @return string
     */
    public function getTenTrucThuoc(){
        return $this->loaiThietBiTrucThuoc !=null ? $this->loaiThietBiTrucThuoc->ten_loai : '';
    }   
    
    /**
     * ham de quy lay danh sach loai thiet bi con truc thuoc (xu ly cho getListTree)
     * @param array $arr
     * @param int $pid
     * @param int $level
     */
    private function getChild($arr, $pid, $level){
        $left = $level . '---';
        $listChildCatalogs = $this::find()->where(['truc_thuoc'=>$pid])->all();
        if($listChildCatalogs != null){
            foreach ($listChildCatalogs as $j=>$catalog1){
                $this->arr[$catalog1->id] = $left . ' ' .$catalog1->ten_loai;
                $this->getChild($this->arr, $catalog1->id, $left);
            }
        }
    }
    
    /**
     * hien thi danh sach loai thiet bi theo phan cap cha-con
     * @param boolean $withGroup
     * @return array
     */
    public function getListTree($withGroup=true)
    {
        if($withGroup==true)
            $this->parr = array();
        $this->arr = array();
        //lay ds catalog parent
        $parentCatalogs = $this::find()->where('truc_thuoc IS NULL OR truc_thuoc = 0')->all();
        foreach ($parentCatalogs as $indexCatalog=>$catalog){
            if($withGroup==true)
                $this->arr = array();
                $this->arr[$catalog->id] = $catalog->ten_loai;
                $this->getChild($this->arr, $catalog->id, '');
                if($withGroup==true)
                    $this->parr[$catalog->ten_loai] = $this->arr;
        }
        if($withGroup==true)
            return $this->parr;
        else
            return $this->arr;
    }
}