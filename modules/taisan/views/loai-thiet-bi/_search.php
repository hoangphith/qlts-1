<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\taisan\models\LoaiThietBiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="loai-thiet-bi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'myFilterForm form-horizontal'
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ma_loai') ?>

    <?= $form->field($model, 'ten_loai') ?>

    <?= $form->field($model, 'don_vi_tinh') ?>

    <?= $form->field($model, 'truc_thuoc') ?>

    <?php // echo $form->field($model, 'loai_thiet_bi') ?>

    <?php // echo $form->field($model, 'ghi_chu') ?>

    <?php // echo $form->field($model, 'thoi_gian_tao') ?>

    <?php // echo $form->field($model, 'nguoi_tao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
