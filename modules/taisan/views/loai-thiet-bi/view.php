<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\taisan\models\LoaiThietBi */
?>
<div class="loai-thiet-bi-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'ma_loai',
            'ten_loai',
            'don_vi_tinh',
            [
                'attribute'=>'truc_thuoc',
                'value'=>$model->tenTrucThuoc
            ],
            [
                'attribute'=>'loai_thiet_bi',
                'value'=>$model->tenLoaiThietBi
            ],
            'ghi_chu:ntext',
            //'thoi_gian_tao',
            //'nguoi_tao',
        ],
    ]) ?>

</div>
