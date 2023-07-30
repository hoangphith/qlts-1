<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset; 
use cangak\ajaxcrud\BulkButtonWidget;
use app\widgets\FilterFormWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TsThietBiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách vật tư/tài sản';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
Yii::$app->params['showSearch'] = true;
Yii::$app->params['showExport'] = true;

$btns = '<a style="margin-left:10px" class="btn ripple btn-primary dropdown-toggle mb-0" href="javascript:void(0);"
		data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		<i class="fa fa-print"></i> IN TEM <i class="fa fa-caret-down ms-1"></i>
	</a>
	<div class="dropdown-menu tx-13" style="min-width:200px">'.			
			BulkButtonWidget::widget([
			    'buttons'=>Html::a('<i class="fa fa-print" aria-hidden="true"></i>&nbsp; In danh sách đã chọn',
			        [Yii::getAlias('@web/taisan/qr/in-qrs')] ,
			        [
			            "class"=>"dropdown-item",
			            //'style'=>'margin-left:20px;',
			            'role'=>'modal-remote-bulk',
			            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
			            'data-request-method'=>'post',
			            'data-confirm-title'=>'Thông báo',
			            'data-confirm-message'=>'Bạn có chắc in dòng được chọn không?'
			        ]),
			]) . Html::a(
			    '<i class="fa fa-print me-2"></i>In theo loại thiết bị',
			    [Yii::getAlias('@web/taisan/qr/in-loai')] ,
			    [
			        "class"=>"dropdown-item",
			        'role'=>'modal-remote',
			    ]
			).'</div>';
?>

<?php Pjax::begin([
    'id'=>'myGrid',
    'timeout' => 10000,
    'formSelector' => '.myFilterForm'
]); ?>

<div class="ts-thiet-bi-index">
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
                    ['role'=>'modal-remote','title'=> 'Thêm thiết bị/tài sản','class'=>'btn btn-outline-primary']).
                    Html::a('<i class="fas fa fa-sync" aria-hidden="true"></i> Tải lại', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-outline-primary', 'title'=>'Reset Grid']).
                    Html::a('<i class="fa fa-qrcode" aria-hidden="true"></i> Quét mã QR', ['qr-scan'],
                        ['role'=>'modal-remote','title'=> 'Quét QRcode','class'=>'btn btn-outline-primary']).
                    '{toggleData}'.
                    '{export}'
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
                'heading' => '<i class="fas fa fa-list" aria-hidden="true"></i> Tài sản/Thiết bị',
                'before'=>'Danh sách Tài sản/Thiết bị',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="fas fa fa-trash" aria-hidden="true"></i>&nbsp; Xoá dòng chọn',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-danger btn-xs",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Thông báo',
                                    'data-confirm-message'=>'Bạn có chắc xoá dòng được chọn không?'
                                ]),
                ]). $btns . '<div class="clearfix"></div>',
            ]
        ])?>
    </div>
</div>
<?php Pjax::end(); ?>
<?php Modal::begin([
   "options" => [
    "id"=>"ajaxCrudModal",
    "tabindex" =>false // important for Select2 to work properly
],
   "id"=>"ajaxCrudModal",
   "dialogOptions"=>["class"=>"modal-xl"],
   'closeButton'=>['label'=>'<span aria-hidden="true">×</span>'],
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<?php Modal::begin([
    'options' => [
            'id'=>'ajaxCrudModal2',
            'tabindex' => false // important for Select2 to work properly
    ],
    'dialogOptions'=>['class'=>'modal-lg'],
    'closeButton'=>['label'=>'<span aria-hidden=\'true\'>×</span>'],
    'id'=>'ajaxCrudModal2',
    'footer'=>'',// always need it for jquery plugin
    ]) ?>
<?php Modal::end(); ?>

<?php
    $searchContent = $this->render("_search", ["model" => $searchModel]);
    echo FilterFormWidget::widget(["content"=>$searchContent, "description"=>"Nhập thông tin tìm kiếm."]) 
?>
