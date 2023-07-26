<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TsThietBi */
?>
<div class="ts-thiet-bi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_thiet_bi',
            'viTri.ten_vi_tri',
            'heThong.ten_he_thong',
            'loaiThietBi.ten_loai',
            'boPhanQuanLy.ten_bo_phan',
            'ten_thiet_bi',
            'id_thiet_bi_cha',
            'id_layout',
            'nam_san_xuat',
            'serial',
            'model',
            'xuat_xu',
            'id_hang_bao_hanh',
            'id_nhien_lieu',
            'dac_tinh_ky_thuat:ntext',
            'id_lop_hu_hong',
            'id_trung_tam_chi_phi',
            'id_don_vi_bao_tri',
            'id_nguoi_quan_ly',
            'ngay_mua',
            'han_bao_hanh',
            'ngay_dua_vao_su_dung',
            'trang_thai',
            'ngay_ngung_hoat_dong',
            'ghi_chu:ntext',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
