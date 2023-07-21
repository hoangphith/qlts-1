<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
/* @var $form yii\widgets\ActiveForm */

//echo \yii\helpers\StringHelper::basename(get_class($model));
//echo (new ReflectionClass($model))->getShortName();
?>

<div class="bo-phan-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- <?= Html::a('<i class="fas fa fa-plus" aria-hidden="true"></i> Thêm mới', ['view-test?id=1'],
                    ['role'=>'modal-remote-2','title'=> 'Thêm mới Bo Phans','class'=>'btn btn-outline-primary']) ?>-->

    <?= $form->field($model, 'ma_bo_phan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_bo_phan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'truc_thuoc')->textInput() ?>

    <?php // $form->field($model, 'la_dv_quan_ly')->textInput() ?>
	
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

    <?php // $form->field($model, 'la_dv_su_dung')->textInput() ?>

   <?php // $form->field($model, 'la_dv_bao_tri')->textInput() ?>

   <?php //$form->field($model, 'la_dv_van_tai')->textInput() ?>

  <?php // $form->field($model, 'la_dv_mua_hang')->textInput() ?>

  <?php // $form->field($model, 'la_dv_quan_ly_kho')->textInput() ?>

   <?php // $form->field($model, 'la_trung_tam_chi_phi')->textInput() ?>

    <?= $form->field($model, 'id_kho_vat_tu')->textInput() ?>

    <?= $form->field($model, 'id_kho_phe_lieu')->textInput() ?>

    <?= $form->field($model, 'id_kho_thanh_pham')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>