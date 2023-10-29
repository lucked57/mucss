<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/reset.css',
        //'css/bootstrap.css',
        //'https://use.fontawesome.com/releases/v5.6.3/css/all.css',
        //'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
       // 'css/style.css',
        //'css/responsive.css',
        'web/vendor/bootstrap/css/bootstrap.min.css',
        'web/vendor/bootstrap-icons/bootstrap-icons.css',
        'web/vendor/fontawesome-free/css/all.min.css',
        'web/vendor/aos/aos.css',
        'web/vendor/glightbox/css/glightbox.min.css',
        'web/vendor/swiper/swiper-bundle.min.css',
        'css/main.css',
    ];
    public $js = [
        //'https://code.jquery.com/jquery-3.3.1.min.js',
        //'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        //'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
        //'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js',
        //'js/core.min.js',
        //'js/script.js',
        //'https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0/axios.js',
        //'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.min.js',
        'web/vendor/bootstrap/js/bootstrap.bundle.min.js',
        'web/vendor/aos/aos.js',
        'web/vendor/glightbox/js/glightbox.min.js',
        'web/vendor/isotope-layout/isotope.pkgd.min.js',
        'web/vendor/swiper/swiper-bundle.min.js',
        'web/vendor/purecounter/purecounter_vanilla.js',
        'web/vendor/php-email-form/validate.js',
        'js/main.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
