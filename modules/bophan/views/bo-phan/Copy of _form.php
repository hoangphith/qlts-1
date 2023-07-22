<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\modules\bophan\models\BoPhan;
use app\modules\kholuutru\models\KhoLuuTru;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
/* @var $form yii\widgets\ActiveForm */

//echo \yii\helpers\StringHelper::basename(get_class($model));
//echo (new ReflectionClass($model))->getShortName();
?>

<div class="bo-phan-form container-fluid formInput">
	
    <?php $form = ActiveForm::begin(); ?>
    
    
    <div class="row">
    <!-- <?= Html::a('<i class="fas fa fa-plus" aria-hidden="true"></i> Thêm mới', ['view-test?id=1'],
                    ['role'=>'modal-remote-2','title'=> 'Thêm mới Bộ phận','class'=>'btn btn-outline-primary']) ?>-->
	<div class="col-md-12">
	<div class="card custom-card">
    	<div class="card-body pd-20 pd-md-40 border shadow-none">
    	<div class="container-fluid">
    	<div class="row">
    	<div class="col-md-6">
    	<div class="card card-body pd-20 pd-md-40 border shadow-none">
    	<h5 class="card-title mg-b-20 text-primary">Thông tin bộ phận</h5>
    	<p class="text-muted card-sub-title mt-1">
    		Thông tin của Phòng ban - Bộ phận thuộc công ty. Nếu là đơn vị trực thuộc Phòng ban vui lòng chọn mục trực thuộc
    		tương ứng.
    	</p>
        <?= $form->field($model, 'ma_bo_phan')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'ten_bo_phan')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'truc_thuoc')->widget(Select2::classname(), [
    		     'data' => BoPhan::getList(),
    		     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('truc_thuoc') .'...'],
    		     'pluginOptions' => [
    		         'allowClear' => true,
    		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
    		     ],
    		 ]);
    	 ?>
        </div>
        </div>
        </div>
        
        <div class="col-md-6">
         <div class="card card-body pd-20 pd-md-40 border shadow-none">
    	<h5 class="card-title mg-b-20 text-primary">Thông tin kho lưu trữ bộ phận</h5>
    	<p class="text-muted card-sub-title mt-1">
    		Thông tin kho thuộc quản lý của Phòng ban/Bộ phận, có thể để trống nếu không có.
    	</p>
     <?= $form->field($model, 'id_kho_vat_tu')->widget(Select2::classname(), [
		     'data' => KhoLuuTru::getList(),
		     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_kho_vat_tu') .'...'],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>
	 
	  <?= $form->field($model, 'id_kho_phe_lieu')->widget(Select2::classname(), [
	      'data' => KhoLuuTru::getList(),
	      'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_kho_phe_lieu') .'...'],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>
	 
	  <?= $form->field($model, 'id_kho_thanh_pham')->widget(Select2::classname(), [
	      'data' => KhoLuuTru::getList(),
	      'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_kho_thanh_pham') .'...'],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>
	 </div>
	 
	 </div>
	 
	 </div>
	 
	 </div>
	 
	 
        </div>
    </div>
    <!-- <div class="col-md-12">
    <div class="card custom-card">
    <div class="card card-body pd-20 pd-md-40 border shadow-none">
    	<h5 class="card-title mg-b-20 text-primary">Thông tin kho lưu trữ bộ phận</h5>
    	<p class="text-muted card-sub-title mt-1">
    		Thông tin kho thuộc quản lý của Phòng ban/Bộ phận, có thể để trống nếu không có.
    	</p>
     <?= $form->field($model, 'id_kho_vat_tu')->widget(Select2::classname(), [
		     'data' => KhoLuuTru::getList(),
		     'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_kho_vat_tu') .'...'],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>
	 
	  <?= $form->field($model, 'id_kho_phe_lieu')->widget(Select2::classname(), [
	      'data' => KhoLuuTru::getList(),
	      'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_kho_phe_lieu') .'...'],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>
	 
	  <?= $form->field($model, 'id_kho_thanh_pham')->widget(Select2::classname(), [
	      'data' => KhoLuuTru::getList(),
	      'options' => ['placeholder' => 'Chọn '. $model->getAttributeLabel('id_kho_thanh_pham') .'...'],
		     'pluginOptions' => [
		         'allowClear' => true,
		         'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'), 
		     ],
		 ]);
	 ?>
	 </div>
	 </div>
	 </div>-->
	 
	
	</div><!-- row -->
	
	<div class="row">
	 <div class="col-md-12">
	 <div class="card custom-card">
    <div class="card card-body pd-20 pd-md-40 border shadow-none">
    	<h5 class="card-title mg-b-20 text-primary"">Thông tin kho lưu trữ bộ phận</h5>
    	<p class="text-muted card-sub-title mt-1">
    		Bật các chức năng hoạt động của Phòng ban/Bộ phận tương ứng để liên kết với các chức năng quản lý khác.
    	</p>
	 <?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_quan_ly'
	]) ?>
	
	<?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_su_dung'
	]) ?>
	
	<?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_bao_tri'
	]) ?>
	
	<?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_van_tai'
	]) ?>
	
	<?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_mua_hang'
	]) ?>
	
	<?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_dv_quan_ly_kho'
	]) ?>
	
	<?= \app\widgets\forms\SwitchWidget::widget([
	    'model'=>$model,
	    'attr'=>'la_trung_tam_chi_phi'
	]) ?>
	</div>
	</div>
	</div>
	</div>

    <?php ActiveForm::end(); ?>
    
</div>
