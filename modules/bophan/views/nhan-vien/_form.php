<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhanVien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhan-vien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_nhan_vien')->textInput() ?>

    <?= $form->field($model, 'ten_nhan_vien')->textInput() ?>

    <?= $form->field($model, 'ngay_sinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gioi_tinh')->textInput() ?>

    <?= $form->field($model, 'ten_truy_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'da_thoi_viec')->textInput() ?>

    <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
