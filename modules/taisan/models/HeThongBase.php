<?php

namespace app\modules\taisan\models;

use Yii;


class HeThongBase extends \app\models\TsHeThong
{
   
    public function rules()
    {
        return [
            [['ma_he_thong', 'ten_he_thong'], 'required'],
            [['truc_thuoc', 'nguoi_tao'], 'integer'],
            [['mo_ta'], 'string'],
            [['thoi_gian_tao'], 'safe'],
            [['ma_he_thong'], 'string', 'max' => 20],
            [['ten_he_thong'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_he_thong' => 'Mã hệ thống',
            'ten_he_thong' => 'Tên hệ thống',
            'truc_thuoc' => 'Trực thuộc',
            'mo_ta' => 'Mô tả',
            'thoi_gian_tao' => 'Thoi Gian Tao',
            'nguoi_tao' => 'Nguoi Tao',
        ];
    }
}
