<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use app\modules\taisan\models\ViTri;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\taisan\models\ViTri */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vi-tri-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_vi_tri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_vi_tri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mo_ta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'truc_thuoc')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(ViTri::find()->all(), 'id', 'ten_vi_tri'),
        'language' => 'vi',
        'options' => ['placeholder' => 'Chọn trực thuộc...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'da_ngung_hoat_dong')
        ->dropDownList(
            ['0'=>'Ngưng', '1'=>'Hoạt động'],           // Flat array ('id'=>'label')
            ['prompt'=>'']    // options
        );
    ?>

    <?=  DatePicker::widget([
            'name' => 'ngay_ngung_hoat_dong', 
            'value' => date('d-m-Y'),
            'options' => ['placeholder' => 'Chọn ngày....'],
            'pluginOptions' => [
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true
            ]
        ]);
        ?>

    <?= $form->field($model, 'id_layout')->textInput() ?>

    <?= $form->field($model, 'toa_do_x')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'toa_do_y')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?> -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Tạo' : 'Sửa', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
