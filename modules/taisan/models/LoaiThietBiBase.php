<?php

namespace app\modules\taisan\models;
use app\modules\dungchung\models\History;
use Yii;

class LoaiThietBiBase extends \app\models\TsLoaiThietBi { 
    const MODEL_ID = 'loaithietbi';
    public function rules()
    {
        return [
            [['ma_loai', 'ten_loai', 'loai_thiet_bi'], 'required'],
            [['truc_thuoc', 'nguoi_tao'], 'integer'],
            [['ghi_chu'], 'string'],
            [['thoi_gian_tao'], 'safe'],
            [['ma_loai', 'don_vi_tinh', 'loai_thiet_bi'], 'string', 'max' => 20],
            [['ten_loai'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_loai' => 'Mã loại',
            'ten_loai' => 'Tên loại',
            'don_vi_tinh' => 'Đơn vị tính',
            'truc_thuoc' => 'Trực thuộc',
            'loai_thiet_bi' => 'Loại thiết bị',
            'ghi_chu' => 'Ghi chú',
            'thoi_gian_tao' => 'Thời gian tạo',
            'nguoi_tao' => 'Người tạo',
        ];
    }

    /**
     * Gets query for [[TsThietBis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTsThietBis()
    {
        return $this->hasMany(TsThietBi::class, ['id_loai_thiet_bi' => 'id']);
    }
    public function getLoaiThietBi()
    {
        return $this->hasOne(LoaiThietBi::class, ['id' => 'truc_thuoc']);
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
