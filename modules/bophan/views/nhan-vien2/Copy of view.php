<?php

use yii\widgets\DetailView;
use app\widgets\forms\SwitchWidget;
use app\widgets\forms\RadioWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
?>
<div class="nhan-vien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bo_phan'=>[
                'attribute'=>'id_bo_phan',
                'value'=>$model->tenBoPhan
            ],
            'ma_nhan_vien',
            'ten_nhan_vien',
            'ngay_sinh',
            'gioi_tinh'=>[
                'attribute'=>'gioi_tinh',
                'format'=>'raw',
                'value'=>RadioWidget::widget([
                    'model'=>$model,
                    'attr'=>'gioi_tinh',
                    'type'=>'VIEW',
                    'list'=>[0=>'Nam', 1=>'Nữ']
                ])
            ],
            'ten_truy_cap',
            'ngay_vao_lam'=>[
                'attribute' => 'ngay_vao_lam',
                'value' => $model->getNgayVaoLam()
            ],
            'da_thoi_viec'=>[
                'attribute'=>'da_thoi_viec',
                'format'=>'raw',
                'value'=>SwitchWidget::widget([
                    'model'=>$model,
                    'attr'=>'da_thoi_viec',
                    'type'=>'VIEW'
                ])
            ],
            'dien_thoai',
            'email:email',
            'dia_chi:ntext',
        ],
    ]) ?>

</div>
