<?php

namespace app\modules\bophan\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\bophan\models\NhanVien;

/**
 * NhanVien2Search represents the model behind the search form about `app\modules\bophan\models\NhanVien`.
 */
class NhanVien2Search extends NhanVien
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nguoi_tao'], 'integer'],
            [['ma_nhan_vien', 'ten_nhan_vien', 'ngay_sinh', 'gioi_tinh', 'ten_truy_cap', 'da_thoi_viec', 'dien_thoai', 'email', 'dia_chi', 'thoi_gian_tao'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NhanVien::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'thoi_gian_tao' => $this->thoi_gian_tao,
            'nguoi_tao' => $this->nguoi_tao,
        ]);

        $query->andFilterWhere(['like', 'ma_nhan_vien', $this->ma_nhan_vien])
            ->andFilterWhere(['like', 'ten_nhan_vien', $this->ten_nhan_vien])
            ->andFilterWhere(['like', 'ngay_sinh', $this->ngay_sinh])
            ->andFilterWhere(['like', 'gioi_tinh', $this->gioi_tinh])
            ->andFilterWhere(['like', 'ten_truy_cap', $this->ten_truy_cap])
            ->andFilterWhere(['like', 'da_thoi_viec', $this->da_thoi_viec])
            ->andFilterWhere(['like', 'dien_thoai', $this->dien_thoai])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi]);

        return $dataProvider;
    }
}
