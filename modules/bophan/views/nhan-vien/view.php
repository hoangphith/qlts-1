<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
?>
<div class="nhan-vien-view container-fluid">
    <div class="row">
    	<div class="col-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'ma_nhan_vien',
                    'ten_nhan_vien',
                    'ngay_sinh',
                    'gioi_tinh',
                    'ten_truy_cap',
                    'da_thoi_viec',
                    'dien_thoai',
                    'email:email',
                    'dia_chi:ntext',
                    'thoi_gian_tao',
                    'nguoi_tao',
                ],
            ]) ?>
    	</div>
    	
    	<div class="col-4">
    		<!-- card custom -->
    		<div class="card custom-card">
                <div class="card-body h-100">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <span>
                                    <button class="btn ripple btn-primary rounded-start-0" type="button">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card custom -->
    	</div>
    
    </div>
</div>
