<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset; 
use cangak\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;
use app\widgets\FilterFormWidget;
use app\modules\bophan\models\BoPhan;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\bophan\models\BoPhanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bộ phận - Phòng ban';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

Yii::$app->params['showSearch'] = true;
Yii::$app->params['showExport'] = true;
Yii::$app->params['showImport'] = true;
Yii::$app->params['showImportDownload'] = Yii::getAlias('@web/uploads/excel/down/mau_import_bo_phan.xlsx');
Yii::$app->params['showImportModel'] = BoPhan::MODEL_ID;

?>

<?php Pjax::begin([
    'id'=>'myGrid',
    'timeout' => 10000,
    'formSelector' => '.myFilterForm'
]); ?>

<div class="bo-phan-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa fa-plus" aria-hidden="true"></i> Thêm mới', ['create'],
                    ['role'=>'modal-remote','title'=> 'Thêm mới Bo Phans','class'=>'btn btn-outline-primary']).
                    Html::a('<i class="fas fa fa-sync" aria-hidden="true"></i> Tải lại', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-outline-primary', 'title'=>'Tải lại']).
                    //'{toggleData}'.
                    (Yii::$app->params['showExport']==true?'{export}':'')
                ],
            ],          
            'striped' => false,
            'condensed' => true,
            'responsive' => true,
            'panelHeadingTemplate'=>'{title}',
            'panelFooterTemplate'=>'<div class="row"><div class="col-md-8">{pager}</div><div class="col-md-4">{summary}</div></div>',
            'summary'=>'Hiển thị dữ liệu {count}/{totalCount}, Trang {page}/{pageCount}',          
            'panel' => [
                //'type' => 'primary', 
                'heading' => '<i class="fas fa fa-list" aria-hidden="true"></i> Danh sách',
                'before'=>'<em>* Danh sách Phòng ban - Bộ phận</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="fas fa fa-trash" aria-hidden="true"></i>&nbsp; Xóa đã chọn',
                                ["bulkdelete"] ,
                                [
                                    'class'=>'btn ripple btn-secondary',
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Xác nhận xóa?',
                                    'data-confirm-message'=>'Bạn có chắc muốn xóa?'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>

<?php Pjax::end(); ?>

<?php Modal::begin([
   'options' => [
        'id'=>'ajaxCrudModal',
        'tabindex' => false // important for Select2 to work properly
   ],
   'dialogOptions'=>['class'=>'modal-xl'],
   'headerOptions'=>['class'=>'text-primary'],
   'titleOptions'=>['class'=>'text-primary'],
   'closeButton'=>['label'=>'<span aria-hidden=\'true\'>×</span>'],
   'id'=>'ajaxCrudModal',
   'footer'=>'',// always need it for jquery plugin
])?>

<?php Modal::end(); ?>

<?php /* Modal::begin([
   'options' => [
        'id'=>'ajaxCrudModal2',
        'tabindex' => false // important for Select2 to work properly
   ],
   'dialogOptions'=>['class'=>'modal-lg'],
   'closeButton'=>['label'=>'<span aria-hidden=\'true\'>×</span>'],
   'id'=>'ajaxCrudModal2',
   'footer'=>'',// always need it for jquery plugin
]) */?>

<?php /* Modal::end(); */ ?>

<?php
   // $searchContent = $this->render("_search", ["model" => $searchModel]);
   // echo $searchContent;
echo FilterFormWidget::widget(["content"=>$this->render("_search", ["model" => $searchModel]), "description"=>"Nhập thông tin tìm kiếm."]) 
?>

<script>
/* $('#bophansearch-truc_thuoc').select2({
        dropdownParent: $('#offcanvasRight')
}); */
</script>

<?php
$script = <<< JS
/*$('#bophansearch-truc_thuoc').select2({
    dropdownParent: $('#offcanvasRight')
});*/
/* var myOffcanvas = document.getElementById('offcanvasRight')
myOffcanvas.addEventListener('show.bs.offcanvas', function () {
  alert('123');
}) */
/*$('.select2').each(function () {
    $(this).select2({
        //theme: 'bootstrap-5',
        dropdownParent: $(this).parent(),
    });
});*/
JS;
$this->registerJs($script);
?>
