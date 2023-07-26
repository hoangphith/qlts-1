<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\taisan\models\HeThong */
?>
<div class="he-thong-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ma_he_thong',
            'ten_he_thong',
            'truc_thuoc',
            'mo_ta:ntext',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
