<?php foreach ($offer_slider as $row) {
    $offer_ids = $row['offer_ids'];
    $ids = explode(",", $offer_ids);
?>
    <main>
        <section class="my-4 bg-white">
            <?php if ($row['style'] == 'style_1' || $row['style'] == 'default') { ?>
                <!-- Swiper1 -->
                <div class="swiper mySwiper grab border-radius-10">
                    <div class="swiper-wrapper">
                        <?php if (isset($ids) && !empty($ids)) { ?>
                            <?php foreach ($ids as $rows) {

                                $offer_details = fetch_details('offers', ['id' => $rows]);
                            ?>
                                <div class="swiper-slide center-swiper-slide">
                                    <a href="<?= ($offer_details[0]['type'] == 'offer_url') ? $offer_details[0]['link'] : base_url('products/manage_offers/' . $rows) ?>">
                                        <img src="<?= isset($offer_details[0]['image']) ? base_url($offer_details[0]['image']) : '' ?>">
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            <?php } elseif ($row['style'] == 'style_2') { ?>
                <!-- <div class="category-section container-fluid text-center dark-category-section icon-dark-sec"> -->
                <div class="offer-section container-fluid text-center">
                    <!-- Swiper2 -->
                    <div class="swiper mySwiper3 swiper-arrow swiper-wid">
                        <div class="swiper-wrapper grab">
                            <?php if (isset($ids) && !empty($ids)) { ?>
                                <?php foreach ($ids as $rows) {

                                    $offer_details = fetch_details('offers', ['id' => $rows]);
                                ?>
                                    <div class="swiper-slide background-none">
                                        <a href="<?= ($offer_details[0]['type'] == 'offer_url') ? $offer_details[0]['link'] : base_url('products/manage_offers/' . $rows) ?>">
                                            <img src="<?= isset($offer_details[0]['image']) ? base_url($offer_details[0]['image']) : '' ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper1-pagination"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                        <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                    </div>
                <?php } elseif ($row['style'] == 'style_3') { ?>
                    <div class="offer-section2 container-fluid text-center">
                        <!-- Swiper3 -->
                        <div class="swiper mySwiper3 swiper-arrow swiper-wid">
                            <div class="swiper-wrapper grab">
                                <?php if (isset($ids) && !empty($ids)) { ?>
                                    <?php foreach ($ids as $rows) {

                                        $offer_details = fetch_details('offers', ['id' => $rows]);
                                    ?>
                                        <div class="swiper-slide background-none">
                                            <a href="<?= ($offer_details[0]['type'] == 'offer_url') ? $offer_details[0]['link'] : base_url('products/manage_offers/' . $rows) ?>">
                                                <img src="<?= isset($offer_details[0]['image']) ? base_url($offer_details[0]['image']) : '' ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination swiper1-pagination"></div>
                            <!-- Add Pagination -->
                            <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                            <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                        </div>
                    </div>
                <?php } elseif ($row['style'] == 'style_4') { ?>
                    <div class="offer-section3 container-fluid text-center">
                        <!-- Swiper4 -->
                        <div class="swiper mySwiper3 swiper-arrow swiper-wid">
                            <div class="swiper-wrapper grab">
                                <?php if (isset($ids) && !empty($ids)) { ?>
                                    <?php foreach ($ids as $rows) {

                                        $offer_details = fetch_details('offers', ['id' => $rows]);
                                    ?>
                                        <div class="swiper-slide background-none">
                                            <a href="<?= ($offer_details[0]['type'] == 'offer_url') ? $offer_details[0]['link'] : base_url('products/manage_offers/' . $rows) ?>">
                                                <img src="<?= isset($offer_details[0]['image']) ? base_url($offer_details[0]['image']) : '' ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination swiper1-pagination"></div>
                            <!-- Add Pagination -->
                            <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                            <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                <?php } ?>
        </section>
    </main>
<?php }  ?>