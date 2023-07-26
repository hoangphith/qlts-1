<?php

namespace app\modules\taisan\models;
use app\modules\dungchung\models\History;
use Yii;

/**
 * This is the model class for table "ts_vi_tri".
 *
 * @property int $id
 * @property string $ma_vi_tri
 * @property string $ten_vi_tri
 * @property string|null $mo_ta
 * @property int|null $truc_thuoc
 * @property int|null $da_ngung_hoat_dong
 * @property string|null $ngay_ngung_hoat_dong
 * @property int|null $id_layout
 * @property string|null $toa_do_x
 * @property string|null $toa_do_y
 * @property string|null $thoi_gian_tao
 * @property int|null $nguoi_tao
 */
class ViTriBase extends \app\models\TsViTri{
    const MODEL_ID = "vitri";
    public function rules()
    {
        return [
            [['ma_vi_tri', 'ten_vi_tri'], 'required'],
            [['mo_ta'], 'string'],
            [['truc_thuoc', 'da_ngung_hoat_dong', 'id_layout', 'nguoi_tao'], 'integer'],
            [['ngay_ngung_hoat_dong', 'thoi_gian_tao'], 'safe'],
            [['ma_vi_tri'], 'string', 'max' => 20],
            [['ten_vi_tri'], 'string', 'max' => 255],
            [['toa_do_x', 'toa_do_y'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_vi_tri' => 'Mã vị trí',
            'ten_vi_tri' => 'Tên vị trí',
            'mo_ta' => 'Mô tả',
            'truc_thuoc' => 'Trực thuộc',
            'da_ngung_hoat_dong' => 'Đã ngưng hoạt động',
            'ngay_ngung_hoat_dong' => 'Ngày ngưng hoạt động',
            'id_layout' => 'Layout',
            'toa_do_x' => 'Toạ độ X',
            'toa_do_y' => 'Toạ độ Y',
            'thoi_gian_tao' => 'Thoi Gian Tao',
            'nguoi_tao' => 'Nguoi Tao',
        ];
    }
    public function getViTriCha()
    {
        return $this->hasOne(ViTri::class, ['id' => 'truc_thuoc']);
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
