<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\bophan\models\NhanVien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nhan-vien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_nhan_vien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_nhan_vien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gioi_tinh')->textInput() ?>

    <?= $form->field($model, 'ten_truy_cap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'da_thoi_viec')->textInput() ?>

    <?= $form->field($model, 'dien_thoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dia_chi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

    <?= $form->field($model, 'nguoi_tao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
