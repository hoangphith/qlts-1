<?php

namespace app\modules\bophan\models;

use Yii;
use app\models\TsNhanVien as NhanVienModel;

class NhanVienBase extends NhanVienModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_nhan_vien'], 'required'],
            [['gioi_tinh', 'da_thoi_viec', 'nguoi_tao'], 'integer'],
            [['dia_chi'], 'string'],
            [['thoi_gian_tao'], 'safe'],
            [['ma_nhan_vien', 'dien_thoai'], 'string', 'max' => 20],
            [['ten_nhan_vien'], 'string', 'max' => 100],
            [['ngay_sinh'], 'string', 'max' => 10],
            [['ten_truy_cap', 'email'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_nhan_vien' => 'Ma Nhan Vien',
            'ten_nhan_vien' => 'Ten Nhan Vien',
            'ngay_sinh' => 'Ngay Sinh',
            'gioi_tinh' => 'Gioi Tinh',
            'ten_truy_cap' => 'Ten Truy Cap',
            'da_thoi_viec' => 'Da Thoi Viec',
            'dien_thoai' => 'Dien Thoai',
            'email' => 'Email',
            'dia_chi' => 'Dia Chi',
            'thoi_gian_tao' => 'Thoi Gian Tao',
            'nguoi_tao' => 'Nguoi Tao',
        ];
    }
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
}
