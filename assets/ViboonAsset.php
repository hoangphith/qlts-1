<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ViboonAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
    ];
    public $js = [
        'assets/plugins/bootstrap/popper.min.js',
        'assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        'assets/plugins/perfect-scrollbar/p-scroll-1.js',
        'assets/plugins/sidemenu/sidemenu.js',
        'assets/plugins/sidebar/sidebar.js',
        'assets/js/sticky.js',
        'assets/plugins/notify/js/jquery.growl.js',
        'assets/plugins/notify/js/notifIt.js',
        'assets/js/custom-switcher.js',
        'assets/js/custom.js',
        'js/custom.js',
        'assets/switcher/js/switcher.js',
        'assets/js/tooltip.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        'kartik\grid\GridViewAsset',
    ];
}
