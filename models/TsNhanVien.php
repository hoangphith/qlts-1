<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ts_nhan_vien".
 *
 * @property int $id
 * @property string|null $ma_nhan_vien
 * @property string $ten_nhan_vien
 * @property string|null $ngay_sinh
 * @property int|null $gioi_tinh
 * @property string|null $ten_truy_cap
 * @property int|null $da_thoi_viec
 * @property string|null $dien_thoai
 * @property string|null $email
 * @property string|null $dia_chi
 * @property string|null $thoi_gian_tao
 * @property int|null $nguoi_tao
 */
class TsNhanVien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ts_nhan_vien';
    }

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
}
