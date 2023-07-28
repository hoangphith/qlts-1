<?php

use yii\widgets\DetailView;
use app\widgets\views\ImageListWidget;
use app\widgets\views\DocumentListWidget;
use app\modules\taisan\models\LoaiThietBi;
use app\modules\taisan\models\ThietBi;
use app\modules\dungchung\models\History;
/* @var $this yii\web\View */
/* @var $model app\models\TsThietBi */
?>
<div class="ts-thiet-bi-view">
 
<div class="panel panel-primary">
	<div class="tab-menu-heading tab-menu-heading-boxed">
		<div class="tabs-menu-boxed">
			<!-- Tabs -->
			<ul class="nav panel-tabs" role="tablist">
				<li><a href="#tab1" class="active" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
					Thông tin
				</a></li>
				<li><a href="#tab3" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
					Tài liệu
				</a></li>
				<li><a href="#tab2" data-bs-toggle="tab" aria-selected="true" role="tab">
					Lịch sử thay đổi
				</a></li>
				<!-- <li><a href="#tab28" data-bs-toggle="tab" aria-selected="false" role="tab" class="" tabindex="-1">Tab 4</a></li> -->
			</ul>
		</div>
	</div>
    <div class="panel-body tabs-menu-body ps">
		<div class="tab-content">
			<div class="tab-pane  active show" id="tab1" role="tabpanel">
				<div class="row">
				<div class="col-md-8">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                       // 'id',
                        'ma_thiet_bi',
                        'viTri.ten_vi_tri',
                        'heThong.ten_he_thong',
                        'loaiThietBi.ten_loai',
                        'boPhanQuanLy.ten_bo_phan',
                        'ten_thiet_bi',
                        [
                            'label'=>'Thiết bị cha ',
                            'value'=>$model->thietBiCha->ten_thiet_bi,
                        ],
                        'id_layout',
                        'nam_san_xuat',
                        'serial',
                        'model',
                        'xuat_xu',
                        'id_hang_bao_hanh',
                        'id_nhien_lieu',
                        'dac_tinh_ky_thuat:ntext',
                        //'id_lop_hu_hong',
                        'id_trung_tam_chi_phi',
                        'id_don_vi_bao_tri',
                        'id_nguoi_quan_ly',
                        'ngay_mua',
                        'han_bao_hanh',
                        'ngay_dua_vao_su_dung',
                        [
                            //'1'=>'Hoạt động', '2'=>'Thanh lý', '3'=>'Mất', '4'=>'Hỏng'],   
                            'label'=>'Trang thai',
                            'value'=>function($data){
                            switch ($data->trang_thai){
                                case "1": return "Hoạt "; break;
                                case "2": return  "Thanh lý "; break;
                                case "3": return  "Mất "; break;
                                default: return "Hỏng";
                            }
                                if($data->trang_thai=="1") return 'Hoạt động ';
                                else return "Ngưng ";
                            }
                        ],
                        //'trang_thai',
                        'ngay_ngung_hoat_dong',
                        'ghi_chu:ntext',
                        // 'thoi_gian_tao',
                        // 'nguoi_tao',
                    ],
                ]) ?>
                </div>
                <div class="col-md-4">
                	<div class="card custom-card">
                    	<div class="card-body h-100">
                    		<div>
                    			<h6 class="card-title mb-1">Hình ảnh</h6>
                    		</div>
                        	<?= ImageListWidget::widget([
                        	    'loai' => ThietBi::MODEL_ID,
                        	    'id_tham_chieu' => $model->id
                        	]) ?>
                        </div>
                     </div>
                </div><!-- col 6 -->
                </div><!-- row -->
			</div>
			
			<div class="tab-pane" id="tab3" role="tabpanel">
				<div class="row">
                <?=  DocumentListWidget::widget([
            	    'loai' => ThietBi::MODEL_ID,
            	    'id_tham_chieu' => $model->id
            	])  ?>
            	</div>
            	<?php // $this->render('_taiLieu', ['model'=>$model]) ?>
			</div>
			
			<div class="tab-pane" id="tab2" role="tabpanel">
				<?= History::showHistory(ThietBi::MODEL_ID, $model->id) ?>
			</div>
		</div>
	</div>
</div>
 	
    

</div>
