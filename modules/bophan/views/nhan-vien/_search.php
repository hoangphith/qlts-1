<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\bophan\models\NhanVien3Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nhan-vien-search">

    <?php $form = ActiveForm::begin([
        'id'=>'myFilterForm',
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ma_nhan_vien') ?>

    <?= $form->field($model, 'ten_nhan_vien') ?>

    <?= $form->field($model, 'ngay_sinh') ?>

    <?= $form->field($model, 'gioi_tinh') ?>

    <?php // echo $form->field($model, 'ten_truy_cap') ?>

    <?php // echo $form->field($model, 'da_thoi_viec') ?>

    <?php // echo $form->field($model, 'dien_thoai') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'dia_chi') ?>

    <?php // echo $form->field($model, 'thoi_gian_tao') ?>

    <?php // echo $form->field($model, 'nguoi_tao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
