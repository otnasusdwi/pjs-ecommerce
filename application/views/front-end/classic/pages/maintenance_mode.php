<section class="mt-5" id="faq_sec">
    <div class="main-content">
        <div class="row mt-5">
            <div class="home_faq mt-5 col-md-7 text-center">
                <h2 class="h5 mt-5 text-center"><span class="span-color">Under Maintenanace</span></h2>
                <div class="accordion mt-5" id="accordionExample">
                    <?php $settings = get_settings('system_settings', true);
                    if (isset($settings) && isset($settings['is_web_under_maintenance']) && ($settings['is_web_under_maintenance'] != '') && ($settings['is_web_under_maintenance'] == 1) && isset($settings['message_for_web']) && ($settings['message_for_web'] != '')) {
                    ?>
                        <h4 class="h3 text-center"><?= $settings['message_for_web'] ?></h4>
                    <?php  } ?>
                </div>
            </div>
            <div class="col-md-5">
                <img class="faq_image" src="<?= THEME_ASSETS_URL . 'demo/maintenance.gif' ?>" alt="faq">
            </div>
        </div>
    </div>
</section>