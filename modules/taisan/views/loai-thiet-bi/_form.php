<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\taisan\models\LoaiThietBi;

/* @var $this yii\web\View */
/* @var $model app\modules\taisan\models\LoaiThietBi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loai-thiet-bi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_loai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_loai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'don_vi_tinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'truc_thuoc')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(LoaiThietBi::find()->all(), 'id', 'ten_loai'),
        'language' => 'vi',
        'options' => ['placeholder' => 'Chọn trực thuộc...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'loai_thiet_bi')
        ->dropDownList(
            ['1'=>'Machine', '2'=>'Vehicle', '3'=>'Tool'],           // Flat array ('id'=>'label')
            ['prompt'=>'']    // options
        );
    ?>
    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 3]) ?>

    <!-- <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?> -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
