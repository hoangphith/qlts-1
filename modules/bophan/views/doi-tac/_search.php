<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\DoiTac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doi-tac-search">

    <?php $form = ActiveForm::begin([
        	'id'=>'myFilterForm',
            'method' => 'post',
            'options' => [
                'class' => 'myFilterForm'
            ]
      	]); ?>

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
