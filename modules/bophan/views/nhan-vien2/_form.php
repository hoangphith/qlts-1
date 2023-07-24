<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhan-vien-form container-fluid formInput">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => [
            'class' => 'form-horizontal'
        ],
        'fieldConfig' => [
            'template' => '<div class="col-sm-4">{label}</div><div class="col-sm-8">{input}{error}</div>',
            'labelOptions' => ['class' => 'col-md-12 control-label'],
        ],
    ]); ?>
	
	<div class="row">
    	<div class="col-md-12">
        	<div class="card custom-card">
        		<div class="row">
            		<div class="col-md-6">
            			<div class="card-body pd-20 pd-md-40 shadow-none">
                        	<h5 class="card-title mg-b-20">Thông tin nhân viên</h5>
                        	<p class="text-muted card-sub-title mt-1">
                        		Thông tin nhân viên
                        	</p>
                        
                            <?= $form->field($model, 'ten_nhan_vien')->textInput(['maxlength' => true]) ?>
                        
                            <?= $form->field($model, 'ngay_sinh')->textInput(['maxlength' => true]) ?>
                        
                            <?= $form->field($model, 'gioi_tinh')->textInput() ?>
                                            
                            <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>
                        
                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        
                            <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>
                    	</div><!-- card-body -->
					</div><!-- col-md-6 -->
					
					<div class="col-md-6">
            			<div class="card-body pd-20 pd-md-40 shadow-none">
                        	<h5 class="card-title mg-b-20">Thông tin cấu hình</h5>
                        	<p class="text-muted card-sub-title mt-1">
                        		Chọn thông tin cấu hình cho nhân viên.
                        	</p>
                        	
                        	<?= $form->field($model, 'ma_nhan_vien')->textInput(['maxlength' => true]) ?>
                        	 
                            <?= $form->field($model, 'id_bo_phan')->textInput() ?>
                        
                            <?= $form->field($model, 'ten_truy_cap')->textInput(['maxlength' => true]) ?>
                        
                            <?= $form->field($model, 'da_thoi_viec')->textInput() ?>
                        
                    	</div><!-- card-body -->
					</div><!-- col-md-6 -->
					
					<div class="col-md-6">
					</div><!-- col-md-6 -->
				</div><!-- row 2 -->
			</div><!-- card -->
		</div><!-- col-md-12 -->
    </div><!-- row -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
