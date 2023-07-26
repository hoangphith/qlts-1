<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\taisan\models\ViTri */
?>
<div class="vi-tri-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_vi_tri',
            'ten_vi_tri',
            'mo_ta:ntext',
            'truc_thuoc',
            'da_ngung_hoat_dong',
            'ngay_ngung_hoat_dong',
            'id_layout',
            'toa_do_x',
            'toa_do_y',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
