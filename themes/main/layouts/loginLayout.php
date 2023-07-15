<?php
use app\assets\ViboonAsset;

ViboonAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en" dir="ltr">

	<head>
		<?php $this->head() ?>
		<!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Viboon – Bootstrap 4 HTML5 Admin Dashboard Responsive Template">
        <meta name="author" content="Spruko™ Technologies Private Limited">
        <meta name="keywords"
            content="admin, dashboard template, template dashboard,bootstrap admin template,admin template,bootstrap dashboard,admin dashboard,admin panel template,bootstrap 4 admin template,bootstrap dashboard template,admin dashboard template,bootstrap admin,dashboard in html,html admin template,bootstrap admin panel">
        <link rel="icon" href="<?= Yii::getAlias('@web')  ?>/assets/images/brand/favicon.ico" type="image/x-icon" >
        <link rel="shortcut icon" type="image/x-icon" href="<?= Yii::getAlias('@web')  ?>/assets/images/brand/favicon.ico" >

        <!-- Title -->
        <title>Viboon – Bootstrap 5 HTML5 Admin Dashboard Responsive Template</title>

        <!-- Bootstrap Css -->
        <link id="style" href="<?= Yii::getAlias('@web')  ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

        <!--Style Css -->
        <link href="<?= Yii::getAlias('@web')  ?>/assets/css/style.css" rel="stylesheet" >

        <!--plugins Css -->
        <link href="<?= Yii::getAlias('@web')  ?>/assets/css/plugins.css" rel="stylesheet" >

        <!--- FONT-ICONS CSS -->
        <link href="<?= Yii::getAlias('@web')  ?>/assets/css/icons.css" rel="stylesheet">

        <!-- SWITCHER-SKINS -->
        <link href="<?= Yii::getAlias('@web')  ?>/assets/switcher/css/switcher.css" rel="stylesheet" >
        <link href="<?= Yii::getAlias('@web')  ?>/assets/switcher/demo.css" rel="stylesheet" >

	</head>

	<body class="app sidebar-mini login-img">
	<?php $this->beginBody() ?>
	
	 <!-- Loader -->
        <div id="global-loader">
            <img src="<?= Yii::getAlias('@web')  ?>/assets/images/svgs/loader.svg" alt="loader">
        </div>
        <!-- /Loader -->

        <!-- Page -->
        <div class="page main-signin-wrapper">

            <!-- Row -->
            <div class="row text-center ps-0 pe-0 ms-0 me-0">
                <div class=" col-xl-3 col-lg-5 col-md-5 d-block mx-auto">
                    <div class="text-center mb-2">
                        <a href="index.html">
                            <img src="<?= Yii::getAlias('@web')  ?>/assets/images/brand/logo.png" class="header-brand-img" alt="logo">
                            <img src="<?= Yii::getAlias('@web')  ?>/assets/images/brand/logo1.png" class="header-brand-img theme-logos" alt="logo">
                        </a>
                    </div>
                    <div class="card custom-card">
                        <div class="card-body pd-25">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
        <!-- End Page -->
		<?php $this->endBody() ?>
        <!-- Back to top -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- jQuery js -->
        <script src="<?= Yii::getAlias('@web')  ?>/assets/js/vendors/jquery.js"></script>

        <!-- Bootstrap js-->
        <script src="<?= Yii::getAlias('@web')  ?>/assets/plugins/bootstrap/popper.min.js"></script>
        <script src="<?= Yii::getAlias('@web')  ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Perfect-scrollbar js-->
        <script src="<?= Yii::getAlias('@web')  ?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <!-- Custom-Switcher js -->
        <script src="<?= Yii::getAlias('@web')  ?>/assets/js/custom-switcher.js"></script>

        <!-- Custom js-->
        <script src="<?= Yii::getAlias('@web')  ?>/assets/js/custom.js"></script>

        <!-- Switcher js -->
        <script src="<?= Yii::getAlias('@web')  ?>/assets/switcher/js/switcher.js"></script>
	
	
	</body>

</html>