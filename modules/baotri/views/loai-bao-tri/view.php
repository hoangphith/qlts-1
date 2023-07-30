<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\baotri\models\LoaiBaoTri */
?>
<div class="loai-bao-tri-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghi_chu:ntext',
            'thoi_gian_tao',
            'nguoi_tao',
        ],
    ]) ?>

</div>
