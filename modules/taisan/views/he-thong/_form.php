<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\taisan\models\HeThong */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="he-thong-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_he_thong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_he_thong')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'truc_thuoc')->textInput() ?>

    <?= $form->field($model, 'mo_ta')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?> -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
