<?php

namespace app\modules\bophan\models;

use Yii;
use app\models\TsNhanVien as NhanVienModel;
use app\modules\dungchung\models\History;

class NhanVienBase extends NhanVienModel
{
    const MODEL_ID = 'nhanvien';
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_nhan_vien', 'id_bo_phan'], 'required'],
            [['gioi_tinh', 'da_thoi_viec', 'nguoi_tao'], 'integer'],
            [['dia_chi'], 'string'],
            [['thoi_gian_tao'], 'safe'],
            [['ma_nhan_vien', 'dien_thoai'], 'string', 'max' => 20],
            [['ten_nhan_vien'], 'string', 'max' => 100],
            [['ngay_sinh'], 'string', 'max' => 10],
            [['ten_truy_cap', 'email'], 'string', 'max' => 200],
            [['id_bo_phan'], 'exist', 'skipOnError' => true, 'targetClass' => BoPhan::class, 'targetAttribute' => ['id_bo_phan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bo_phan'=>'Thuộc bộ phận',
            'ma_nhan_vien' => 'Mã nhân viên',
            'ten_nhan_vien' => 'Tên nhân viên',
            'ngay_sinh' => 'Ngày sinh',
            'gioi_tinh' => 'Giới tính',
            'ten_truy_cap' => 'Tên truy cập',
            'da_thoi_viec' => 'Đã thôi việc',
            'dien_thoai' => 'Điện thoại',
            'email' => 'Email',
            'dia_chi' => 'Địa chỉ',
            'thoi_gian_tao' => 'Thời gian tạo',
            'nguoi_tao' => 'Người tạo',
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
    
    /**
     * {@inheritdoc}
     */
    public function afterSave( $insert, $changedAttributes ){
        parent::afterSave($insert, $changedAttributes);
        History::addHistory($this::MODEL_ID, $changedAttributes, $this, $insert);
    }
}
