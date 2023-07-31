<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\NhomDoiTac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nhom-doi-tac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_nhom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_nhom')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
