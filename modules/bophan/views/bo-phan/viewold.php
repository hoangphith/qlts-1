<?php

use yii\widgets\DetailView;
use app\widgets\BoolViewWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
?>
<div class="bo-phan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'ma_bo_phan',
            'ten_bo_phan',
            'truc_thuoc'=>[
                'attribute'=>'truc_thuoc',
                'value'=>$model->trucThuoc
            ],
            'la_dv_quan_ly'=>[
                'attribute'=>'la_dv_quan_ly',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_quan_ly])
            ],
            'la_dv_su_dung'=>[
                'attribute'=>'la_dv_su_dung',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_su_dung])
            ],
            'la_dv_bao_tri'=>[
                'attribute'=>'la_dv_bao_tri',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_bao_tri])
            ],
            'la_dv_van_tai'=>[
                'attribute'=>'la_dv_van_tai',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_van_tai])
            ],
            'la_dv_mua_hang'=>[
                'attribute'=>'la_dv_mua_hang',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_mua_hang])
            ],
            'la_dv_quan_ly_kho'=>[
                'attribute'=>'la_dv_quan_ly_kho',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_dv_quan_ly_kho])
            ],
            'la_trung_tam_chi_phi'=>[
                'attribute'=>'la_trung_tam_chi_phi',
                'format'=>'html',
                'value'=>BoolViewWidget::widget(['value'=>$model->la_trung_tam_chi_phi])
            ],
            'id_kho_vat_tu',
            'id_kho_phe_lieu',
            'id_kho_thanh_pham',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
        'template' => "<tr><th style='width: 25%;'>{label}</th><td>{value}</td></tr>"
    ]) ?>

</div>
