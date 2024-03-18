<!-- end offer-slider -->
<!-- flash_sale -->
<main>
    <?php $this->load->view('front-end/modern/pages/flash_sale'); ?>

    <section class="container py-4">
        <h2 class="section-title mb-3"><?= !empty($this->lang->line('flash_sale')) ? $this->lang->line('flash_sale') : 'Flash Sale' ?></h2>
        <div class="main-content">
            <div class=''>
                <!-- Swiper -->
                <div class="swiper-container banner-swiper">
                    <div class="swiper-wrapper">
                        <?php if (isset($sliders) && !empty($sliders)) { ?>
                            <?php foreach ($sliders as $row) { ?>
                                <div class="swiper-slide center-swiper-slide">
                                    <a href="<?= $row['link'] ?>">
                                        <img src="<?= base_url($row['image']) ?>">
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper1-pagination"></div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <!-- offer-slider -->
        <?php $this->load->view('front-end/modern/pages/offer_slider'); ?>
    </section>
</main>