<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\DoiTac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doi-tac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_doi_tac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_doi_tac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_nhom_doi_tac')->textInput() ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tai_khoan_ngan_hang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_so_thue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'la_nha_cung_cap')->textInput() ?>

    <?= $form->field($model, 'la_khach_hang')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
