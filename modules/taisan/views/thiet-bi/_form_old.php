<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TsThietBi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ts-thiet-bi-form">
    <div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
                <div class="col-6">
                    <fieldset class="border p-2">
                            <div class="row">
                                <div class="col-3">
                                    <?= $form->field($model, 'ma_thiet_bi')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-9">
                                    <?= $form->field($model, 'ten_thiet_bi')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?= $form->field($model, 'id_thiet_bi_cha')->textInput() ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <?= $form->field($model, 'id_loai_thiet_bi')->textInput() ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'id_vi_tri')->textInput() ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?= $form->field($model, 'id_he_thong')->textInput() ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'id_layout')->textInput() ?>
                                </div>
                            </div>
                    </fieldset>
                </div>
                <div class="col-6">
                    <fieldset class="border p-2">
                        <div class="row">
                            <div class="col">
                                <?= $form->field($model, 'nam_san_xuat')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col">
                                <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col">
                                <?= $form->field($model, 'xuat_xu')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= $form->field($model, 'id_hang_bao_hanh')->textInput() ?>
                            </div>
                            <div class="col">
                                <?= $form->field($model, 'id_nhien_lieu')->textInput() ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= $form->field($model, 'id_nhien_lieu')->textInput() ?>
                            </div>
                            <div class="col">
                                <?= $form->field($model, 'id_lop_hu_hong')->textInput() ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>


        <div class="row">
            <div class="col-6">
                <fieldset class="border p-2">
                    <div class="row">
                        <div class="col">
                                <?= $form->field($model, 'dac_tinh_ky_thuat')->textarea(['rows' => 1]) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $form->field($model, 'id_lop_hu_hong')->textInput() ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'id_trung_tam_chi_phi')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $form->field($model, 'id_don_vi_bao_tri')->textInput() ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'id_nguoi_quan_ly')->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?= $form->field($model, 'ngay_mua')->textInput() ?>
                        </div>
                        <div class="col">
                            <?= $form->field($model, 'han_bao_hanh')->textInput() ?>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-6">
                <fieldset class="border p-2">
                <div class="row">
                    <div class="col">
                        <?= $form->field($model, 'ngay_dua_vao_su_dung')->textInput() ?>
                    </div>
                    <div class="col">
                        <?= $form->field($model, 'trang_thai')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?= $form->field($model, 'ngay_ngung_hoat_dong')->textInput() ?>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col">
                        <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 4]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>
                    </div>
                    <div class="col">
                        <?= $form->field($model, 'nguoi_tao')->textInput() ?>
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
       
       
       
       
      
      

        
        

       

        

        

       

        

    
        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>
