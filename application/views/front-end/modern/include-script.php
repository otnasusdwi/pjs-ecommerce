<!-- jquery -->
<!-- <script src="<?= base_url("assets/front_end/modern/js/jquery.min.js") ?>"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<!-- bootstrap -->
<script src="<?= base_url("assets/front_end/modern/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js") ?>"></script>

<!-- font awesome -->
<script src="<?= base_url('assets/front_end/modern/fontawesome-free-6.4.0-web/js/all.min.js') ?>"></script>

<!-- jssocial -->
<script src="<?= base_url('assets/front_end/modern/js/jssocials.min.js') ?>"></script>

<!-- select 2 -->
<script src="<?= base_url('assets/front_end/modern/js/select2.full.min.js') ?>"></script>

<!-- sweetalert2 -->
<script src="<?= base_url('assets/front_end/modern/js/sweetalert2.all.min.js') ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/admin_old/js/tagify.min.js') ?>"></script>

<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<!-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/themes/krajee-svg/theme.js"></script> -->

<!-- Swiper JS -->
<script src="<?= base_url("assets/front_end/modern/js/swiper-js-bundle.js") ?>"></script>

<!-- lazy-load js -->
<script src="<?= base_url('assets/front_end/modern/js/lazyload.min.js') ?>"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.3/dist/lazyload.min.js"></script> -->

<!-- star rating js -->
<script src="<?= base_url('assets/front_end/modern/js/star-rating.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/front_end/modern/js/star-rating.min.js') ?>" type="text/javascript"></script>

<!-- bootstrap table -->
<script src="<?= base_url('assets/front_end/modern/js/bootstrap-table.min.js') ?>"></script>

<!-- elevatezoom -->
<script src="<?= base_url('assets/front_end/modern/js/elevatezoom.min.js') ?>"></script>

<!-- daterangepicker js -->
<script src="<?= base_url('assets/front_end/modern/js/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/daterangepicker.js') ?>"></script>

<!-- Firebase.js -->
<script src="<?= base_url('assets/front_end/modern/js/firebase-app.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/firebase-auth.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/firebase-firestore.js') ?>"></script>
<script src="<?= base_url('firebase-config.js') ?>"></script>

<!-- intlTelInput -->
<script src="<?= base_url('assets/front_end/modern/js/intlTelInput.js') ?>"></script>

<!-- light box -->
<script src="<?= base_url('assets/front_end/modern/js/lightbox.js') ?>"></script>

<!-- lottie animation js -->
<script
    src="<?= base_url('assets/front_end/modern/js/unpkg.com_@lottiefiles_lottie-player@2.0.2_dist_lottie-player.js') ?>">
</script>

<!-- jquery validation -->
<script src="<?= base_url('assets/front_end/modern/js/jquery.validate.min.js') ?>"></script>

<!-- dropzone  -->
<script src="<?= base_url('assets/front_end/modern/js/dropzone.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/stisla.js') ?>"></script>

<!-- Markdown -->
<script src="<?= base_url('assets/front_end/modern/js/Markdown.Converter.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/Markdown.Sanitizer.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/Markdown.Editor.js') ?>"></script>


<!-- <script src="<?= THEME_ASSETS_URL . 'js/Markdown.Converter.js' ?>"></script>
<script src="<?= THEME_ASSETS_URL . 'js/Markdown.Sanitizer.js' ?>"></script>
<script src="<?= THEME_ASSETS_URL . 'js/Markdown.Editor.js' ?>"></script> -->


<!-- Custom Js -->
<script type="module" src="<?= base_url('assets/front_end/modern/js/custom.js') ?>"></script>
<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    iconColor: 'white',
    customClass: {
        popup: 'colored-toast'
    },
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true
})
</script>

<?php if ($this->session->flashdata('message')) { ?>
<script>
Toast.fire({
    icon: '<?= $this->session->flashdata('message_type'); ?>',
    title: "<?= $this->session->flashdata('message'); ?>"
});
</script>
<?php } ?>