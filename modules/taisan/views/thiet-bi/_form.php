<?php
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\taisan\models\LoaiThietBi;
use app\modules\taisan\models\ThietBi;
use kartik\date\DatePicker;
use app\modules\taisan\models\HeThong;
use app\modules\taisan\models\ViTri;
use app\modules\taisan\models\BoPhan;
use app\modules\bophan\models\NhanVien;
use app\modules\taisan\models\LopHuHong;
/* @var $this yii\web\View */
/* @var $model app\models\TsThietBi */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .legend{
        font-size: 14px; 
        font-weight: bold; 
        margin: 0px; 
        padding: 0px;
        background: 040404;
    }
</style>

<div class="ts-thiet-bi-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal'],]); ?>

    <div class="row">
    
        <div class="col-6">
            <fieldset class="border p-2"><!--Thông tin chung -->
            <legend class="legend"><p>Thông tin chung</p></legend>
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
                    <!-- <?= $form->field($model, 'id_thiet_bi_cha')->textInput() ?> -->
                    <?= $form->field($model, 'id_thiet_bi_cha')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(ThietBi::find()->all(), 'id', 'ten_thiet_bi'),
                        'language' => 'vi',
                        'options' => ['placeholder' => 'Chọn thiết bị...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);?>
                </div>
                <div class="col">
                <?= $form->field($model, 'id_loai_thiet_bi')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(LoaiThietBi::find()->all(), 'id', 'ten_loai'),
                    'language' => 'vi',
                    'options' => ['placeholder' => 'Chọn loại thiết bị...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                    ],
                    
                ]);?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'id_vi_tri')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(ViTri::find()->all(), 'id', 'ten_vi_tri'),
                        'language' => 'vi',
                        'options' => ['placeholder' => 'Chọn vị trí...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                        ],
                    ]);?>
                </div>
                <div class="col">
                <?= $form->field($model, 'id_he_thong')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(HeThong::find()->all(), 'id', 'ten_he_thong'),
                    'language' => 'vi',
                    'options' => ['placeholder' => 'Chọn hệ thống...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                    ],
                ]);?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'id_layout')->textInput() ?>
                </div>
            </div>
            </fieldset>

            <fieldset class="border p-2"><!--Đặc tính kỹ thuật -->
            <legend class="legend"><p>Thông tin kỹ thuật</p></legend>
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
                    <?= $form->field($model, 'dac_tinh_ky_thuat')->textarea(['rows' => 1]) ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'id_lop_hu_hong')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(LopHuHong::find()->all(), 'id', 'ten_lop'),
                            'language' => 'vi',
                            'options' => ['placeholder' => 'Chọn lớp...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                            ],
                    ]);?>
                </div>
            </div>
            </fieldset>
        </div>
        <!--Cột thứ 2-->
        <div class="col-6">
            <fieldset class="border p-2"><!--phụ trách -->
            <legend class="legend"><p>Phụ trách</p></legend>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'id_trung_tam_chi_phi')->textInput() ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'id_nguoi_quan_ly')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(NhanVien::find()->all(), 'id', 'ten_nhan_vien'),
                            'language' => 'vi',
                            'options' => ['placeholder' => 'Chọn người quản lý...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                            ],
                    ]);?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'id_don_vi_bao_tri')->textInput() ?>
                </div>
                <div class="col">
                <?= $form->field($model, 'id_bo_phan_quan_ly')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(BoPhan::find()->all(), 'id', 'ten_bo_phan'),
                        'language' => 'vi',
                        'options' => ['placeholder' => 'Chọn bộ phận quản lý...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'dropdownParent' => new yii\web\JsExpression('$("#ajaxCrudModal")'),
                        ],
                    ]);?>
                </div>
            </div>
            </fieldset><!--end phụ trách-->

            <fieldset class="border p-2"><!--Thời gian và trạng thái -->
            <legend class="legend"><p>Thời gian và trạng thái</p></legend>
            <div class="row">
                <div class="col">
                <?= '<label class="form-label">Ngày mua</label>';?>
                <?=  DatePicker::widget([
                    'name' => 'ngay_mua', 
                    'value' => date('d-m-Y'),
                    'options' => ['placeholder' => 'Chọn ngày mua....'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ]);
                    ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'han_bao_hanh')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <?= '<label class="form-label">Ngày đưa vào sử dụng</label>';?>
                <?=  DatePicker::widget([
                    'name' => 'ngay_dua_vao_su_dung', 
                    'value' => date('d-m-Y'),
                    'options' => ['placeholder' => 'Chọn ngày ....'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true
                    ]
                ]);
                    ?>
                </div>
                <div class="col">
                    <?= $form->field($model, 'trang_thai')
                        ->dropDownList(
                            ['1'=>'Hoạt động', '2'=>'Thanh lý', '3'=>'Mất', '4'=>'Hỏng'],           // Flat array ('id'=>'label')
                            ['prompt'=>'']    // options
                        );
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <?= '<label class="form-label">Ngày ngưng hoạt động</label>';?>
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
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?= $form->field($model, 'ghi_chu')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            </fieldset><!--End thoi gian trang thai-->
        </div>
    </div>

        <!-- <?= $form->field($model, 'thoi_gian_tao')->textInput() ?>

        <?= $form->field($model, 'nguoi_tao')->textInput() ?> -->


        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Thêm' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>

    <?php ActiveForm::end(); ?>
</div>

   