<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\kholuutru\models\KhoLuuTru */
?>
<div class="kho-luu-tru-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_kho',
            'ten_kho',
            'loai_kho',
            'id_nguoi_quan_ly',
            'id_bo_phan_quan_ly',
            'gia_tri_toi_da',
            'dien_thoai',
            'email:email',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
