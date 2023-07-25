<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use kartik\select2\Select2;
use app\widgets\forms\SwitchWidget;
use app\widgets\forms\RadioWidget;
use app\modules\bophan\models\BoPhan;
use app\modules\user\models\User;
use kartik\date\DatePicker;
use app\modules\dungchung\models\CustomFunc;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
/* @var $form yii\widgets\ActiveForm */

$cus = new CustomFunc();
if($model->ngay_vao_lam != null){
    $model->ngay_vao_lam = $cus->convertYMDToDMY($model->ngay_vao_lam);
}
?>

<div class="bo-phan-form container-fluid formInput">

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
							
							<div class="mb-3 row field-nhanvien-gioi_tinh">
                            	<div class="col-sm-4"><label class="col-md-12 control-label" for="nhanvien-gioi_tinh"><?= $model->getAttributeLabel('gioi_tinh') ?></label></div>
                            	<div class="col-sm-8">
                            	<?= RadioWidget::widget([
                            	    'model'=>$model,
                            	    'attr'=>'gioi_tinh',
                                	'list'=>[0=>'Nam', 1=>'Nữ']
                            	]) ?>
                        	<div class="invalid-feedback "></div></div>
                            </div>
                                            
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
                        	
                        	<?= $form->field($model, 'ngay_vao_lam')->widget(DatePicker::classname(), [
                                        'options' => [
                                            'placeholder' => 'Chọn ngày...'
                                        ],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd/mm/yyyy'
                                        ] ]);
                        	?>
                        	 
                        	  <?= $form->field($model, 'id_bo_phan')->widget(Select2::classname(), [
                                     'data' => (new BoPhan())->getListTree(),
                        		     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_bo_phan') .'...'],
                        		     'pluginOptions' => [
                        		         'allowClear' => true,
                        		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
                        		     ],
                        		 ]);
                        	 ?>                           
                        
                             <?= $form->field($model, 'ten_truy_cap')->widget(Select2::classname(), [
                                     'data' => (new User())->getListUnused($model->ten_truy_cap),
                        		     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('ten_truy_cap') .'...'],
                        		     'pluginOptions' => [
                        		         'allowClear' => true,
                        		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
                        		     ],
                        		 ]);
                        	 ?>  
                        	                        	
                        	<div class="mb-3 row field-nhanvien-ma_nhan_vien">
                            	<div class="col-sm-4"><label class="col-md-12 control-label" for="nhanvien-da_thoi_viec"></label></div>
                            	<div class="col-sm-8"><?= SwitchWidget::widget([
                        	    'model'=>$model,
                        	    'attr'=>'da_thoi_viec'
                        	]) ?><div class="invalid-feedback "></div></div>
                            </div>
                             
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
