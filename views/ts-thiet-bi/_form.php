<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TsThietBi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ts-thiet-bi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_thiet_bi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_vi_tri')->textInput() ?>

    <?= $form->field($model, 'id_he_thong')->textInput() ?>

    <?= $form->field($model, 'id_loai_thiet_bi')->textInput() ?>

    <?= $form->field($model, 'id_bo_phan_quan_ly')->textInput() ?>

    <?= $form->field($model, 'ten_thiet_bi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_thiet_bi_cha')->textInput() ?>

    <?= $form->field($model, 'id_layout')->textInput() ?>

    <?= $form->field($model, 'nam_san_xuat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xuat_xu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_hang_bao_hanh')->textInput() ?>

    <?= $form->field($model, 'id_nhien_lieu')->textInput() ?>

    <?= $form->field($model, 'dac_tinh_ky_thuat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_lop_hu_hong')->textInput() ?>

    <?= $form->field($model, 'id_trung_tam_chi_phi')->textInput() ?>

    <?= $form->field($model, 'id_don_vi_bao_tri')->textInput() ?>

    <?= $form->field($model, 'id_nguoi_quan_ly')->textInput() ?>

    <?= $form->field($model, 'ngay_mua')->textInput() ?>

    <?= $form->field($model, 'han_bao_hanh')->textInput() ?>

    <?= $form->field($model, 'ngay_dua_vao_su_dung')->textInput() ?>

    <?= $form->field($model, 'trang_thai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_ngung_hoat_dong')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
