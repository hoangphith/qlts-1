<?php
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use app\widgets\forms\SwitchWidget;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\bophan\models\BoPhan;
use app\modules\taisan\models\LoaiThietBi;
//use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\bophan\models\BoPhan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thiet-bi-search">

    <?php $form = ActiveForm::begin([
        	'id'=>'myFilterForm',
            'method' => 'post',
            'options' => [
                'class' => 'myFilterForm form-horizontal'
            ],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => '<div class="col-sm-4">{label}</div><div class="col-sm-8">{input}{error}</div>',
                'labelOptions' => ['class' => 'col-md-12 control-label'],
            ],
      	]); ?>

    <?= $form->field($model, 'ma_thiet_bi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_thiet_bi')->textInput(['maxlength' => true]) ?>
    
	<?= $form->field($model, 'id_loai_thiet_bi')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(LoaiThietBi::find()->all(), 'id', 'ten_loai'),
            'language' => 'vi',
            'options' => ['placeholder' => 'Chọn loại thiết bị...'],
            'pluginOptions' => [
                'allowClear' => true,
                //'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
            ],
            
        ]);?>
        <?= $form->field($model, 'id_bo_phan_quan_ly')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(BoPhan::find()->all(), 'id', 'ten_bo_phan'),
            'language' => 'vi',
            'options' => ['placeholder' => '---Chọn---'],
            'pluginOptions' => [
                'allowClear' => true,
                //'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
            ],
            
        ]);?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton('Tìm kiếm',['class' => 'btn btn-primary']) ?>
	        <?= Html::resetButton('Xóa tìm kiếm', ['class' => 'btn btn-outline-secondary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
