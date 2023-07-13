<?= $this->render('_header') ?>

<?= $this->render('_main_header') ?>		

<?= $this->render('_slide_menu') ?>	
			

			

			<!-- Main Content-->
			<div class="main-content side-content pt-0">
				<div class="side-app">

					<div class="main-container container-fluid">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-20 mg-b-5">Empty Page</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Empty Page</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="me-2">
									<a class="btn ripple btn-primary dropdown-toggle mb-0" href="javascript:void(0);"
										data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="fe fe-external-link"></i> Export <i class="fa fa-caret-down ms-1"></i>
									</a>
									<div class="dropdown-menu tx-13">
										<a class="dropdown-item" href="javascript:void(0);"><i
												class="fa fa-file-pdf-o me-2"></i>Export as
											Pdf</a>
										<a class="dropdown-item" href="javascript:void(0);"><i
												class="fa fa-image me-2"></i>Export as
											Image</a>
										<a class="dropdown-item" href="javascript:void(0);"><i
												class="fa fa-file-excel-o me-2"></i>Export as
											Excel</a>
									</div>
								</div>
								<div>
									<a href="javascript:void(0);"
										class="btn ripple btn-secondary navresponsive-toggler mb-0"
										data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
										aria-expanded="false"
										aria-label="Toggle navigation">
										<i class="fe fe-filter me-1"></i> Filter
									</a>
								</div>
							</div>
						</div>
						<!-- End Page Header -->

						<!-- Row -->
						<div class="row sidemenu-height">
							<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<?= $content ?>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div>
			</div>
			<!-- End Main Content-->

<?= $this->render('_slidebar') ?>			

<?= $this->render('_footer') ?>
<?php $this->endPage() ?>
			