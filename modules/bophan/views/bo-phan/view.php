<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
?>
<div class="bo-phan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_bo_phan',
            'ten_bo_phan',
            'truc_thuoc',
            'la_dv_quan_ly',
            'la_dv_su_dung',
            'la_dv_bao_tri',
            'la_dv_van_tai',
            'la_dv_mua_hang',
            'la_dv_quan_ly_kho',
            'la_trung_tam_chi_phi',
            'id_kho_vat_tu',
            'id_kho_phe_lieu',
            'id_kho_thanh_pham',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
