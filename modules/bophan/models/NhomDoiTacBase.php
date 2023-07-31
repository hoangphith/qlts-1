<?php

namespace app\modules\bophan\models;

use Yii;

class NhomDoiTacBase extends \app\models\TsNhomDoiTac
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ma_nhom', 'ten_nhom'], 'required'],
            [['thoi_gian_tao'], 'safe'],
            [['nguoi_tao'], 'integer'],
            [['ma_nhom'], 'string', 'max' => 20],
            [['ten_nhom'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ma_nhom' => 'Ma Nhom',
            'ten_nhom' => 'Ten Nhom',
            'thoi_gian_tao' => 'Thoi Gian Tao',
            'nguoi_tao' => 'Nguoi Tao',
        ];
    }

    /**
     * Gets query for [[TsDoiTacs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTsDoiTacs()
    {
        return $this->hasMany(DoiTac::class, ['id_nhom_doi_tac' => 'id']);
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
