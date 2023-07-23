<?php

namespace app\modules\bophan\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\modules\kholuutru\models\KhoLuuTru;

class BoPhan extends BoPhanBase
{
    /**
     * ---------virtual varible ---------
     */
    public $arr;
    public $parr;
    
    public static function getList(){
        $list = BoPhan::find()->all();
        return ArrayHelper::map($list, 'id', 'ten_bo_phan');
    }
    
    /**
     * Gets query for [[BoPhan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonViTrucThuoc(){
        return $this->truc_thuoc!=NULL?$this->hasOne(BoPhan::class, ['id' => 'truc_thuoc'])/* ->andOnCondition('truc_thuoc IS NOT NULL') */:NULL;
    }
    
    public function getTrucThuoc(){
        return $this->donViTrucThuoc!=null?$this->donViTrucThuoc->ten_bo_phan:'';
    }
    
    /**
     * Gets query for [[BoPhan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdKhoVatTu(){
        return $this->id_kho_vat_tu!=NULL ? $this->hasOne(KhoLuuTru::class, ['id' => 'id_kho_vat_tu']) : NULL;
    }
    
    public function getKhoVatTu(){
        return $this->idKhoVatTu!=NULL?$this->idKhoVatTu->ten_kho:'';
    }
    
    /**
     * Gets query for [[BoPhan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdKhoPheLieu(){
        return $this->id_kho_phe_lieu!=NULL ? $this->hasOne(KhoLuuTru::class, ['id' => 'id_kho_phe_lieu']) : NULL;
    }
    public function getKhoPheLieu(){
        return $this->idKhoPheLieu!=null?$this->idKhoPheLieu->ten_kho:'';
    }
    
    /**
     * Gets query for [[BoPhan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdKhoThanhPham(){
        return $this->id_kho_thanh_pham!=NULL ? $this->hasOne(KhoLuuTru::class, ['id' => 'id_kho_thanh_pham']) : NULL;
    }
    
    public function getKhoThanhPham(){
        return $this->idKhoThanhPham!=null?$this->idKhoThanhPham->ten_kho:'';
    }
    
    /**
     * get list index is id
     */
    /**
     *
     * @param unknown $arr
     * @param unknown $pid
     * @param unknown $level
     */
    public function getChild($arr, $pid, $level){
        $left = $level . '---';
        $listChildCatalogs = $this::find()->where(['truc_thuoc'=>$pid])->all();
        if($listChildCatalogs != null){
            foreach ($listChildCatalogs as $j=>$catalog1){
                $this->arr[$catalog1->id] = $left . ' ' .$catalog1->ten_bo_phan;
                $this->getChild($this->arr, $catalog1->id, $left);
            }
        }
    }
    
    /**
     *
     * @return unknown
     */
    public function getListTree($withGroup=true)
    {
        if($withGroup==true)
            $this->parr = array();
        $this->arr = array();
        //lay ds catalog parent
        $parentCatalogs = $this::find()->where('truc_thuoc IS NULL OR truc_thuoc = 0')->all();
        foreach ($parentCatalogs as $i=>$catalog){
            if($withGroup==true)
                $this->arr = array();
            $this->arr[$catalog->id] = $catalog->ten_bo_phan;
            $this->getChild($this->arr, $catalog->id, '');
            if($withGroup==true)
                $this->parr[$catalog->ten_bo_phan] = $this->arr;
        }
        if($withGroup==true)
            return $this->parr;
        else 
            return $this->arr;
    }
}