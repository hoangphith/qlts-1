<?php

namespace app\modules\kholuutru\models;

use Yii;
use app\modules\dungchung\models\History;

class KhoLuuTruBase extends \app\models\TsKhoLuuTru
{
    const MODEL_ID = 'kholuutru';
   /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_kho', 'ten_kho', 'loai_kho', 'id_nguoi_quan_ly', 'id_bo_phan_quan_ly'], 'required'],
            [['loai_kho', 'id_nguoi_quan_ly', 'id_bo_phan_quan_ly', 'gia_tri_toi_da', 'nguoi_tao'], 'integer'],
            [['thoi_gian_tao'], 'safe'],
            [['ma_kho', 'dien_thoai'], 'string', 'max' => 20],
            [['ten_kho', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_kho' => 'Ma Kho',
            'ten_kho' => 'Ten Kho',
            'loai_kho' => 'Loai Kho',
            'id_nguoi_quan_ly' => 'Id Nguoi Quan Ly',
            'id_bo_phan_quan_ly' => 'Id Bo Phan Quan Ly',
            'gia_tri_toi_da' => 'Gia Tri Toi Da',
            'dien_thoai' => 'Dien Thoai',
            'email' => 'Email',
            'thoi_gian_tao' => 'Thoi Gian Tao',
            'nguoi_tao' => 'Nguoi Tao',
        ];
    }

    /**
     * Gets query for [[TsNhanVienKhos]].
     *
     * @return \yii\db\ActiveQuery
     */
   /*  public function getTsNhanVienKhos()
    {
        return $this->hasMany(TsNhanVienKho::class, ['id_kho' => 'id']);
    } */
    /**
     * {@inheritdoc}
     */
    
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->thoi_gian_tao = date('Y-m-d H:i:s');
            $this->nguoi_tao = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
    
    /**
     * {@inheritdoc}
     */
    public function afterSave( $insert, $changedAttributes ){
        parent::afterSave($insert, $changedAttributes);
        History::addHistory($this::MODEL_ID, $changedAttributes, $this, $insert);
    }
}
