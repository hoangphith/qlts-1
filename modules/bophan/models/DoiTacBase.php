<?php

namespace app\modules\bophan\models;

use Yii;

class DoiTacBase extends \app\models\TsDoiTac
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_doi_tac', 'ten_doi_tac', 'id_nhom_doi_tac'], 'required'],
            [['id_nhom_doi_tac', 'la_nha_cung_cap', 'la_khach_hang', 'nguoi_tao'], 'integer'],
            [['dia_chi'], 'string'],
            [['thoi_gian_tao'], 'safe'],
            [['ma_doi_tac', 'dien_thoai'], 'string', 'max' => 20],
            [['ten_doi_tac', 'email', 'ma_so_thue'], 'string', 'max' => 255],
            [['tai_khoan_ngan_hang'], 'string', 'max' => 100],
            [['id_nhom_doi_tac'], 'exist', 'skipOnError' => true, 'targetClass' => NhomDoiTac::class, 'targetAttribute' => ['id_nhom_doi_tac' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_doi_tac' => 'Ma Doi Tac',
            'ten_doi_tac' => 'Ten Doi Tac',
            'id_nhom_doi_tac' => 'Id Nhom Doi Tac',
            'dia_chi' => 'Dia Chi',
            'dien_thoai' => 'Dien Thoai',
            'email' => 'Email',
            'tai_khoan_ngan_hang' => 'Tai Khoan Ngan Hang',
            'ma_so_thue' => 'Ma So Thue',
            'la_nha_cung_cap' => 'La Nha Cung Cap',
            'la_khach_hang' => 'La Khach Hang',
            'thoi_gian_tao' => 'Thoi Gian Tao',
            'nguoi_tao' => 'Nguoi Tao',
        ];
    }

    /**
     * Gets query for [[NhomDoiTac]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNhomDoiTac()
    {
        return $this->hasOne(NhomDoiTac::class, ['id' => 'id_nhom_doi_tac']);
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
