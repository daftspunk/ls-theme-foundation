<?= $this->js_combine(array(
    '@javascript/jquery-1.5.1.min.js',
    'ls_core_jquery',
    '@core/vendor/javascript/jquery.uniform.min.js',
    '@core/vendor/javascript/jquery.jcarousel.min.js',
    '@core/vendor/javascript/jquery.fancybox-1.3.4.pack.js',
    '@core/vendor/javascript/jquery-ui-1.8.11.custom.min.js',
    '@core/vendor/javascript/jquery.ui.stars.js',
    '@core/vendor/javascript/jquery.livequery.js',
    '@core/vendor/javascript/jquery.placeholder.js',
    '@core/vendor/javascript/jquery.bar.js',
    '@core/javascript/modernizr.foundation.js',
    '@core/javascript/jquery.reveal.js',
    '@core/javascript/jquery.orbit.js',
    '@core/javascript/jquery.tooltips.js',
    '@core/javascript/jquery.ftabs.js',
    '@core/javascript/app.js',

    '@javascript/jquery.ls_alert.js',
    '@javascript/global.js',
)) ?>

<?= $this->css_combine(array(
  '@core/vendor/css/uniform.default.css',
  '@core/vendor/css/jquery.fancybox-1.3.4.css',
  '@core/vendor/css/carousel_skin.css',
  '@core/vendor/css/jquery.ui.stars.css',
  'ls_styles'
)) ?>

<link href="<?= root_url('news/rss') ?>" type="application/rss+xml" rel="alternate" title="News" />

<? /* These links are needed if working locally
<link rel="stylesheet" type="text/css" href="<?=theme_resource_url('core/vendor/css/jquery.ui.stars.css')?>" />
<link rel="stylesheet" type="text/css" href="<?=theme_resource_url('core/vendor/css/uniform.default.css')?>" />
<link rel="stylesheet" type="text/css" href="<?=theme_resource_url('core/vendor/css/carousel_skin.css')?>" />
<link rel="stylesheet" type="text/css" href="<?=theme_resource_url('core/vendor/css/jquery.fancybox-1.3.4.css')?>" />
*/ ?>

<link rel="stylesheet/less" type="text/css" href="<?=theme_resource_url('less/boot.less')?>" />
<script src="<?=theme_resource_url('javascript/less.js')?>"></script>

