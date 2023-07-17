<?php
use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use kartik\grid\GridView;
use cangak\ajaxcrud\CrudAsset; 
use cangak\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\UserAjaxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="user-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            //'options'=>['class'=>'table-responsive border p-0 pt-3'],
            'tableOptions' => [
                //'id' => 'theDatatable',
                //'class'=>'table table-bordered mg-b-0'
            ],
            'toolbar'=> [
                ['content'=>
                    Html::a('<i class="fas fa fa-plus" aria-hidden="true"></i> Thêm mới', ['create'],
                    ['role'=>'modal-remote','title'=> 'Thêm mới Users','class'=>'btn btn-outline-primary']).
                    Html::a('<i class="fas fa fa-sync" aria-hidden="true"></i> Tải lại', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-outline-primary', 'title'=>'Tải lại']).
                    //'{toggleData}'.
                    '{export}'
                ],
            ],          
            'striped' => false,
            'condensed' => true,
            'responsive' => true,   
            'panelHeadingTemplate'=>'{title}',
            'panelFooterTemplate'=>'{summary}',
            'summary'=>'Hiển thị dữ liệu {count}/{totalCount}, Trang {page}/{pageCount}',
            'panel' => [
                //'type' => 'primary', 
                'heading' => '<i class="fas fa fa-list" aria-hidden="true"></i> Danh sách',
                'headingOptions' => ['class'=>'card-header'],
                'before'=>'<em>* Danh sách Users</em>',
                'after'=>BulkButtonWidget::widget([
                            'buttons'=>Html::a('<i class="fas fa fa-trash" aria-hidden="true"></i>&nbsp; Xóa đã chọn',
                                ["bulkdelete"] ,
                                [
                                    "class"=>"btn btn-sm btn-outline-danger",
                                    'role'=>'modal-remote-bulk',
                                    'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                    'data-request-method'=>'post',
                                    'data-confirm-title'=>'Xác nhận xóa?',
                                    'data-confirm-message'=>'Bạn có chắc muốn xóa?'
                                ]),
                        ]).                        
                        '<div class="clearfix"></div>',
            ],
            /* 'panelTemplate'=>'<div class="panel {type} card custom-card">
                {panelHeading}
                {panelBefore}
                {items}
                {panelAfter}
                {panelFooter}
            </div>' */
        ])?>
    </div>
</div>
<?php Modal::begin([
   "options" => [
    "id"=>"ajaxCrudModal",
    "tabindex" => false // important for Select2 to work properly
],
    "dialogOptions"=>["class"=>"modal-lg"],
   "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<!-- /*send toast message */ -->
<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto"><i class="typcn typcn-info-large"></i>Thông báo</strong>
      <!-- <small>Vừa xong</small> -->
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body"></div>
  </div>
</div>


<!-- <div class="demo-static-toast pos-absolute t-10 r-10">
	<div id="liveToast" aria-atomic="true" aria-live="assertive" class="toast fade show" role="alert" data-bs-autohide="true">
		<div class="toast-header">
			<h6 class="tx-14 mg-b-0 mg-e-auto">Thông báo</h6>
			<small class="text-muted text-nowrap ms-1">Vừa xong</small> <button aria-label="Close" class="ms-2 mb-1 btn-close tx-normal" data-bs-dismiss="toast" type="button"><span aria-hidden="true">×</span></button>
		</div>
		<div class="toast-body"></div>
	</div>
</div> -->

