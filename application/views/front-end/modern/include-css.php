<!-- bootstrap -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/bootstrap-5.3.0-dist/css/bootstrap.min.css') ?>">

<!-- google fonts -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/Lexend-Deca-fonts.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/Open-Sans-fonts.css') ?>">

<!-- font awesome -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/fontawesome-free-6.4.0-web/css/all.min.css') ?>">
<!-- Favicon -->
<?php $favicon = get_settings('web_favicon'); ?>

<link rel="icon" href="<?= base_url($favicon) ?>" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="<?= base_url('assets/admin_old/css/tagify.min.css') ?>">

<!-- select 2 -->
<link rel="icon" type="image/x-icon" href="<?= base_url("assets/front_end/modern/css/select2.css") ?>">
<link rel="icon" type="image/x-icon" href="<?= base_url("assets/front_end/modern/css/select2.min.css") ?>">

<!-- star rating-css -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/star-rating.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/star-rating.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/theme.min.css') ?>">

<!-- ionicons -->
<script src="<?= base_url('assets/front_end/modern/ionicons/dist/ionicons/ionicons.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/ionicons/dist/ionicons/index.esm.js') ?>"></script>

<!-- intlTelInput -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/intlTelInput.css') ?>" />

<!-- bootstrap table -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/bootstrap-table.min.css') ?>" />

<!-- sweetalert2 -->
<link rel="stylesheet" href="<?= base_url("assets/front_end/modern/css/sweetalert2.min.css") ?>">

<!-- x-zoom -->
<link rel="stylesheet" href="<?= base_url("assets/front_end/modern/xZoom-master/dist/xzoom.css") ?>">

<!-- daterangepicker  -->
<link rel="stylesheet" href="<?= base_url("assets/front_end/modern/css/daterangepicker.css") ?>">

<!-- jssocials -->
<link rel="stylesheet" href="<?= base_url("assets/front_end/modern/css/jssocials.css") ?>">

<!-- light-box -->
<link rel="stylesheet" href="<?= base_url("assets/front_end/modern/css/lightbox.css") ?>">

<!-- swiper-js -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/swiper-js.css') ?>">
<!-- chat css  -->
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/components.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/dropzone.css') ?>">

<!-- custom css -->
<link rel="stylesheet" href="<?= base_url("assets/front_end/modern/css/utilas.css") ?>">

<?php if (ALLOW_MODIFICATION  == 0) { ?>
    <link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/colors/default.css') ?>" id="color-switcher">
<?php } else { ?>
    <?php
    $settings = get_settings('web_settings', true);
    $modern_theme_color = (isset($settings['modern_theme_color']) && !empty($settings['modern_theme_color'])) ? $settings['modern_theme_color'] : 'default'; ?>
    <link rel="stylesheet" href="<?= base_url("assets/front_end/modern/css/colors/" . $modern_theme_color . '.css') ?>">
<?php } ?>
<script type="text/javascript">
    <?php
    $currency = get_settings('currency');
    ?>
    base_url = "<?= base_url() ?>";
    currency = "<?= isset($currency) ?>";
    csrfName = "<?= $this->security->get_csrf_token_name() ?>";
    csrfHash = "<?= $this->security->get_csrf_hash() ?>";
</script>
<link rel="stylesheet" href="<?= base_url('assets/front_end/modern/css/custom.css') ?>">