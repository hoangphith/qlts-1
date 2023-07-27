<?php
use app\modules\dungchung\models\TaiLieu;
use app\modules\bophan\models\NhanVien;

$taiLieus = TaiLieu::getTaiLieuThamChieu(NhanVien::MODEL_ID, $model->id);
?>

<div class="card custom-card" id="list">
	<div class="card-body">
		<div>
			<h6 class="card-title mb-1">Media List</h6>
			<p class="text-muted card-sub-title mt-1">Because the media object has so
				few
				structural
				requirements, you can also use these classes on list HTML elements.</p>
		</div>
		<div class="text-wrap">
			<div class="example">
				<ul class="list-unstyled">
					<li class="media d-block d-sm-flex">
						<img alt="img" class="wd-sm-100  mg-sm-r-20 mg-b-20 mg-sm-b-0 br-3" src="../assets/images/media/6.jpg">
						<div class="media-body">
							<h5>Media heading</h5>Cras sit amet nibh libero, in gravida
							nulla.
							Nulla vel metus scelerisque ante sollicitudin. Cras purus
							odio,
							vestibulum in vulputate at, tempus viverra turpis. Fusce
							condimentum
							nunc ac nisi vulputate fringilla. Donec lacinia congue felis
							in
							faucibus.
						</div>
					</li>
					<li class="media d-block d-sm-flex mg-t-25">
						<img alt="img" class="wd-sm-100  mg-sm-r-20 mg-b-20 mg-sm-b-0 br-3" src="../assets/images/media/7.jpg">
						<div class="media-body">
							<h5>Media heading</h5>Cras sit amet nibh libero, in gravida
							nulla.
							Nulla vel metus scelerisque ante sollicitudin. Cras purus
							odio,
							vestibulum in vulputate at, tempus viverra turpis. Fusce
							condimentum
							nunc ac nisi vulputate fringilla. Donec lacinia congue felis
							in
							faucibus.
						</div>
					</li>
					<li class="media d-block d-sm-flex mg-t-25">
						<img alt="img" class="wd-sm-100  mg-sm-r-20 mg-b-20 mg-sm-b-0 br-3" src="../assets/images/media/8.jpg">
						<div class="media-body">
							<h5>Media heading</h5>Cras sit amet nibh libero, in gravida
							nulla.
							Nulla vel metus scelerisque ante sollicitudin. Cras purus
							odio,
							vestibulum in vulputate at, tempus viverra turpis. Fusce
							condimentum
							nunc ac nisi vulputate fringilla. Donec lacinia congue felis
							in
							faucibus.
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>