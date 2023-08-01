<?php

namespace app\modules\taisan\models;
use app\modules\dungchung\models\History;
use Yii;

class LoaiThietBiBase extends \app\models\TsLoaiThietBi { 
    
    const MODEL_ID = 'loaithietbi';
    
    /**
     * Danh muc loai thiet bi
     * @return string[]
     */
    public static function getDmLoaiThietBi(){
        return [
            'THIETBI'=>'Thiết bị/Máy móc',
            'COGIOI'=>'Xe cơ giới',
            'VANCHUYEN'=>'Xe vận chuyển',
        ];
    }
    
    /**
     * Danh muc loai thiet bi label
     * @param int $val
     * @return string
     */
    public static function getLoaiThietBiLabel($val){
        $label = '';
        if($val == 'THIETBI'){
            $label = 'Thiết bị/Máy móc';
        }else if($val == 'COGIOI'){
            $label = 'Xe cơ giới';
        }else if($val == 'VANCHUYEN'){
            $label = 'Xe vận chuyển';
        }
        return $label;
    }
    
    /**
     * {@inheritdoc}
     */
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
        return $this->hasMany(ThietBi::class, ['id_loai_thiet_bi' => 'id']);
    }
    
    /**
     * Gets query for [[trucThuoc]].
     * @return NULL|\yii\db\ActiveQuery
     */
    public function getLoaiThietBiTrucThuoc()
    {
        return $this->truc_thuoc!=NULL?$this->hasOne(LoaiThietBi::class, ['id' => 'truc_thuoc']):NULL;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert) {
        if ($this->isNewRecord) {
            $this->thoi_gian_tao = date('Y-m-d H:i:s');
            $this->nguoi_tao = Yii::$app->user->isGuest ? '' : Yii::$app->user->id;
            if($this->truc_thuoc == null)
                $this->truc_thuoc = 0;
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
