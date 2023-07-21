<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bo-phan-search">

    <?php $form = ActiveForm::begin([
        	'id'=>'myFilterForm',
            'method' => 'post',
            'options' => [
                'class' => 'myFilterForm'
            ]
      	]); ?>

    <?= $form->field($model, 'ma_bo_phan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_bo_phan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'truc_thuoc')->textInput() ?>

    <?= $form->field($model, 'la_dv_quan_ly')->textInput() ?>

    <?= $form->field($model, 'la_dv_su_dung')->textInput() ?>

    <?= $form->field($model, 'la_dv_bao_tri')->textInput() ?>

    <?= $form->field($model, 'la_dv_van_tai')->textInput() ?>

    <?= $form->field($model, 'la_dv_mua_hang')->textInput() ?>

    <?= $form->field($model, 'la_dv_quan_ly_kho')->textInput() ?>

    <?= $form->field($model, 'la_trung_tam_chi_phi')->textInput() ?>

    <?= $form->field($model, 'id_kho_vat_tu')->textInput() ?>

    <?= $form->field($model, 'id_kho_phe_lieu')->textInput() ?>

    <?= $form->field($model, 'id_kho_thanh_pham')->textInput() ?>

    <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Tìm kiếm',['class' => 'btn btn-primary']) ?>
	        <?= Html::resetButton('Xóa tìm kiếm', ['class' => 'btn btn-outline-secondary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
