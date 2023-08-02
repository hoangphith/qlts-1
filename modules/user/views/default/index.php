<?php 
Yii::$app->params['showTopSearch'] = false;
Yii::$app->params['moduleID'] = 'Home';
Yii::$app->params['modelID'] = 'Dashboard';
?>

<div class="row row-cards">
	<div class="col-sm-12 col-lg-3">
		<?= $this->render('_sumTaiSanDangHoatDong') ?>
	</div>
	<div class="col-sm-12 col-lg-3">
		<?= $this->render('_sumLoaiCoGioi') ?>
	</div>
	<div class="col-sm-12 col-lg-3">
		<?= $this->render('_sumVanChuyen') ?>
	</div>
	<div class="col-sm-12 col-lg-3">
		<?= $this->render('_sumThietBi') ?>
	</div>
</div>

<div class="row">
	<div class="col-xl-4 col-lg-12 col-md-12">
		<?= $this->render('_box-1') ?>
	</div>
	<div class="col-xl-4 col-lg-12 col-md-12">
		<?= $this->render('_box-2') ?>
	</div>
	<div class="col-xl-4 col-lg-12 col-md-12">
		<?= $this->render('_box-3') ?>
	</div>
</div>