<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\DoiTac */
?>
<div class="doi-tac-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_doi_tac',
            'ten_doi_tac',
            'id_nhom_doi_tac',
            'dia_chi:ntext',
            'dien_thoai',
            'email:email',
            'tai_khoan_ngan_hang',
            'ma_so_thue',
            'la_nha_cung_cap',
            'la_khach_hang',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
