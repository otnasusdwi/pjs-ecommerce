<input type="hidden" id="product-filters" value='<?= (!empty($filters)) ? escape_array($filters) : ""  ?>' data-key="<?= $filters_key ?>" />
<input type="hidden" id="brand-filters" value='<?= (!empty($brands)) ? escape_array($brands) : ""  ?>' data-key="<?= $filters_key ?>" />
<main>
    <section class="container-lg py-4">
        <section class="breadcrumb-title-bar colored-breadcrumb">
            <div class="main-content responsive-breadcrumb">
                <h5 class="section-title"><?= isset($page_main_bread_crumb) ? $page_main_bread_crumb : 'Product Listing' ?></h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= !empty($this->lang->line('home')) ? $this->lang->line('home') : 'Home' ?></a></li>
                        <?php if (isset($right_breadcrumb) && !empty($right_breadcrumb)) {
                            foreach ($right_breadcrumb as $row) {
                        ?>
                                <li class="breadcrumb-item"><?= $row ?></li>
                        <?php }
                        } ?>
                        <li class="breadcrumb-item active" aria-current="page"><?= !empty($this->lang->line('products')) ? $this->lang->line('products') : 'Products' ?></li>
                    </ol>
                </nav>
            </div>

        </section>
        <!-- product-filter in mobilescreen -->
        <?php 
        // echo "<pre>";
        // print_r($products['filters']);
        // die;
        if (isset($products['filters']) && !empty($products['filters'])) { ?>
            <div class="d-lg-none row product-filter-mobilescreen mb-4 py-2">
                <button class="btn col py-0 sortby-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sort-by" aria-controls="offcanvasBottom">
                    <ion-icon name="funnel-outline"></ion-icon> <span class="mx-2"> <?= label('sort_by', 'Sort By') ?></span>
                </button>
                <button class="btn col py-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#filter" aria-controls="offcanvasBottom">
                    <ion-icon name="options-outline"></ion-icon><span class="mx-2"> <?= label('filter', 'Filter') ?></span>
                </button>
            </div>
        <?php } ?>
        <!-- pc screen view -->
        <div class="row m-0">
            <?php if (isset($products['filters']) && !empty($products['filters'])) { ?>
                <div class="col-lg-3 d-none d-lg-block filter-section p-3">
                    <h3 class="mb-4"><?= label('filter', 'Filter') ?></h3>
                    <div id="product-filters-desktop">
                        <?php foreach ($products['filters'] as $key => $row) {
                            $row_attr_name = str_replace(' ', '-', $row['name']);
                            $attribute_name = isset($_GET[strtolower('filter-' . $row_attr_name)]) ? $this->input->get(strtolower('filter-' . $row_attr_name), true) : 'null';
                            $selected_attributes = explode('|', $attribute_name);
                            $attribute_values = explode(',', $row['attribute_values']);
                            $attribute_values_id = explode(',', $row['attribute_values_id']);
                        ?>
                            <div class="accordion accordion-flush border-top" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c<?= $key ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <?= html_escape($row['name']) ?>
                                        </button>
                                    </h2>
                                    <div id="c<?= $key ?>" class="accordion-collapse collapse <?= ($attribute_name != 'null') ? 'show' : '' ?>" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <?php foreach ($attribute_values as $key => $values) {
                                                $values = strtolower($values);
                                            ?>
                                                <div class="form-check d-flex ps-0">
                                                    <?= form_checkbox(
                                                        $values,
                                                        $values,
                                                        (in_array($values, $selected_attributes)) ? TRUE : FALSE,
                                                        array(
                                                            'class' => 'toggle-input product_attributes width15px',
                                                            'id' => $row_attr_name . ' ' . $values,
                                                            'data-attribute' => strtolower(str_replace('-', ' ', $row['name'])),
                                                        )
                                                    ) ?>
                                                    <label class="form-check-label ms-2" for="<?= $row_attr_name . ' ' . $values ?>">
                                                        <?= form_label($values, $row_attr_name . ' ' . $values, array('class' => 'text-label')) ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="brand-filters-desktop" class="filter_brands mb-5 mt-2 bg-white">
                        <?php if (isset($brands) && !empty($brands)) { ?>
                            <div class="align-content-center d-flex justify-content-between">
                                <h6 class="m-0"><?= label('brands', 'Brands') ?></h6>
                            </div>
                            <div class="brand_filter d-flex flex-wrap gap-4 mb-5 mt-2 p-1">
                                <?php
                                $brands_filter = json_decode(($brands), true);
                                foreach ($brands_filter as $key => $value) {
                                ?>
                                    <div class="brand_div">
                                        <label class="form-check-label" for="<?= $value['brand_id'] ?>-brand">
                                            <input class="brand form-check-input" type="radio" name="brandRadio" data-value="<?= $value['brand_slug'] ?>" id="<?= $value['brand_id'] ?>-brand">
                                            <img src="<?= base_url($value['brand_img']) ?>" alt="brand-logo">
                                        </label>

                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary product_filter_btn"><?= label('filter', 'Filter') ?></button>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-9">
                <?php if (isset($products) && !empty($products['product'])) { ?>
                    <div class="productlist-title-section d-flex justify-content-between">
                        <h3 class="section-title"><?= label('products', 'Products') ?></h3>
                        <div class="d-flex gap-2">
                            <a id="product_grid_view_btn" class="grid-list-icon-box link-dark">
                                <ion-icon class="grid-icons-outline" title="Grid view"></ion-icon>
                            </a>
                            <a id="product_list_view_btn" class="grid-list-icon-box  link-dark">
                                <ion-icon class="list-icons-outline" title="List view"></ion-icon>
                            </a>
                            <div class="sort-by-btn d-none d-lg-block">
                                <select class="form-select" id="product_sort_by" aria-label="Default select example">
                                    <option value="Relevance">Relevance</option>
                                    <option value="top-rated" <?= ($this->input->get('sort') == "top-rated") ? 'selected' : '' ?>><?= label('top_rated', 'Top Rated') ?></option>
                                    <option value="date-desc" <?= ($this->input->get('sort') == "date-desc") ? 'selected' : '' ?>><?= label('newest_first', 'Newest First') ?></option>
                                    <option value="date-asc" <?= ($this->input->get('sort') == "date-asc") ? 'selected' : '' ?>><?= label('oldest_first', 'Oldest First') ?></option>
                                    <option value="price-asc" <?= ($this->input->get('sort') == "price-asc") ? 'selected' : '' ?>><?= label('price_low_to_high', 'Price - Low To High') ?></option>
                                    <option value="price-desc" <?= ($this->input->get('sort') == "price-desc") ? 'selected' : '' ?>><?= label('price_high_to_low', 'Price - High To Low') ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (isset($products) && !empty($products['product'])) { ?>
                    <?php if (isset($_GET['type']) && $_GET['type'] == "list") { ?>
                        <!-- laptop screen -->
                        <div class="productlist-lg d-none d-lg-block my-3">
                            <?php foreach ($products['product'] as $row) {
                            ?>
                                <div class="card list-view-card mb-3 ">
                                    <div class="rating-div">
                                        <div class="product-icon-spacebtw">
                                            <div class="add-to-fav-btn" title="like" data-product-id="<?= $row['id'] ?>">
                                                <ion-icon class="ion-icon ion-icon-hover <?= ($row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('products/details/' . $row['slug']) ?>" class="text-reset text-decoration-none">
                                        <div class="row g-0">
                                            <div class="col-md-3">
                                                <div class="img-box-200">
                                                    <link itemprop="image" href="<?= $row['image_sm'] ?>" />
                                                    <img class="img-fluid rounded-start pic-1 lazy" src="<?= $row['image_sm'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="card-body">
                                                    <h5 class="card-title" itemprop="name"><?= $row['name'] ?>
                                                    </h5>
                                                    <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                    <div class="listview-text">
                                                        <ul class="list-unstyled">
                                                            <li itemprop="description"><?= (isset($row['short_description']) && !empty($row['short_description'])) ? output_escaping(str_replace('\r\n', '&#13;&#10;', $row['short_description'])) : "" ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 border-left">
                                                <div class="card-body">
                                                    <h4 class="card-price" itemprop="offers" itemtype="https://schema.org/Offer">
                                                        <meta itemprop="price" content="<?= $row['variants'][0]['price']; ?>" />
                                                        <meta itemprop="priceCurrency" content="<?= $settings['currency'] ?>" />
                                                        <?php if (!empty($row['min_max_price']['special_price'])) { ?>
                                                            <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['special_price']) ?>
                                                    </h4>
                                                    <p class="m-0"><small><span class="text-decoration-line-through striped-price" itemprop="price"><?= $settings['currency'] . ' ' . number_format($row['min_max_price']['min_price']) ?></span><span class="text-success"><?php if (isset($row['min_max_price']['special_price']) && $row['min_max_price']['special_price'] != '' && $row['min_max_price']['special_price'] != 0 && $row['min_max_price']['special_price'] < $row['min_max_price']['min_price']) { ?>
                                                                    <?php if ($row['is_on_sale'] == 1) { ?>
                                                                        <span class="product-discount-label"><?= $row['sale_discount'] ?>%</span>
                                                                    <?php } else { ?>
                                                                        <span class="product-discount-label"><?= $row['min_max_price']['discount_in_percentage'] ?>%</span>
                                                                    <?php } ?>

                                                                <?php } ?> off</span></small></p>
                                                    <p class="m-0"><small class="fw-bold text-success">Lowest Price Daily</small></p>
                                                <?php } else { ?>
                                                    <span itemprop="price"> <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['min_price']) ?></span>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- mobile screen -->
                        <div class="productlist-md d-lg-none d-block my-3">
                            <?php foreach ($products['product'] as $row) {

                            ?>
                                <div class="card list-view-card mb-3">
                                    <div class="rating-div">
                                        <div class="product-icon-spacebtw">
                                            <div class="add-to-fav-btn" title="like" data-product-id="<?= $row['id'] ?>">
                                                <ion-icon class="ion-icon ion-icon-hover <?= ($row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?= base_url('products/details/' . $row['slug']) ?>" class="text-reset text-decoration-none">
                                        <div class="row g-0">
                                            <div class="col-sm-3 col-4">
                                                <div class="img-box-200">
                                                    <link itemprop="image" href="<?= $row['image_sm'] ?>" />
                                                    <img class="img-fluid rounded-start pic-1 lazy" src="<?= $row['image_sm'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-8">
                                                <div class="card-body">
                                                    <h6 class="card-title" itemprop="name"><?= $row['name'] ?></h6>
                                                    <small class="text-secondary" itemprop="description"><?= (isset($row['short_description']) && !empty($row['short_description'])) ? output_escaping(str_replace('\r\n', '&#13;&#10;', $row['short_description'])) : "" ?>
                                                    </small>
                                                    <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                    <h4 class="card-price" itemprop="offers" itemtype="https://schema.org/Offer">
                                                        <meta itemprop="price" content="<?= $row['variants'][0]['price']; ?>" />
                                                        <meta itemprop="priceCurrency" content="<?= $settings['currency'] ?>" />
                                                        <?php if (!empty($row['min_max_price']['special_price'])) { ?>
                                                            <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['special_price']) ?>
                                                    </h4>
                                                    <p class="m-0"><small><span class="text-decoration-line-through striped-price" itemprop="price"><?= $settings['currency'] . ' ' . number_format($row['min_max_price']['min_price']) ?></span><span class="text-success"><?php if (isset($row['min_max_price']['special_price']) && $row['min_max_price']['special_price'] != '' && $row['min_max_price']['special_price'] != 0 && $row['min_max_price']['special_price'] < $row['min_max_price']['min_price']) { ?>
                                                                    <?php if ($row['is_on_sale'] == 1) { ?>
                                                                        <span class="text-success fw-bold"><?= $row['sale_discount'] ?>%</span>
                                                                    <?php } else { ?>
                                                                        <span class="fw-bold ms-2"><?= $row['min_max_price']['discount_in_percentage'] ?>%</span>
                                                                    <?php } ?>

                                                                <?php } ?> off</span></small></p>
                                                    <p class="m-0"><small class="fw-bold text-success">Lowest Price Daily</small></p>
                                                <?php } else { ?>
                                                    <span itemprop="price"> <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['min_price']) ?></span>
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="row my-4">
                            <?php foreach ($products['product'] as $row) {

                            ?>
                                <div class="col-md-4 col-sm-6 grid-card-container product-card">
                                    <div class="card grid-view-card product-card" data-product-id="<?= $row['id'] ?>">
                                        <div class="rating-div">
                                            <div class="product-icon-spacebtw">
                                                <div class="add-to-fav-btn" title="like" data-product-id="<?= $row['id'] ?>">
                                                    <ion-icon class="ion-icon ion-icon-hover <?= ($row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?= base_url('products/details/' . $row['slug']) ?>" class="text-reset text-decoration-none">
                                            <div>
                                                <div class="img-box-h250">
                                                    <link itemprop="image" href="<?= $row['image_sm'] ?>" />
                                                    <img class="pic-1 lazy" src="<?= $row['image_sm'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title" itemprop="name"><?= $row['name'] ?></h5>
                                                <!-- <p class="card-text">17.27 cm (6.8 inch) Quad HD+ Display, 200MP + 10MP + 12MP +
                                    10MP | 12MP Front Camera</p> -->
                                                <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                <div class="d-flex align-items-center">
                                                    <h4 class="card-price" itemprop="offers" itemtype="https://schema.org/Offer">
                                                        <meta itemprop="price" content="<?= $row['variants'][0]['price']; ?>" />
                                                        <meta itemprop="priceCurrency" content="<?= $settings['currency'] ?>" />
                                                        <?php if (!empty($row['min_max_price']['special_price'])) { ?>
                                                            <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['special_price']) ?>
                                                    </h4>
                                                    <p class="m-0"><small><span class="text-decoration-line-through fw-bold ms-2" itemprop="price"><?= $settings['currency'] . ' ' . number_format($row['min_max_price']['min_price']) ?></span><span class="text-success fw-bold"><?php if (isset($row['min_max_price']['special_price']) && $row['min_max_price']['special_price'] != '' && $row['min_max_price']['special_price'] != 0 && $row['min_max_price']['special_price'] < $row['min_max_price']['min_price']) { ?>
                                                                    <?php if ($row['is_on_sale'] == 1) { ?>
                                                                        <span class="product-discount-label fw-bold"><?= $row['sale_discount'] ?>%</span>
                                                                    <?php } else { ?>
                                                                        <span class="product-discount-label fw-bold"><?= $row['min_max_price']['discount_in_percentage'] ?>%</span>
                                                                    <?php } ?>

                                                                <?php } ?> off</span></small></p>
                                                <?php } else { ?>
                                                    <span itemprop="price"> <?= $settings['currency'] ?></i><?= number_format($row['min_max_price']['min_price']) ?></span>
                                                <?php } ?>
                                                </div>
                                                <?php
                                                if ($row['is_on_sale'] == 1) {
                                                    $variant_price = ($row['variants'][0]['sale_final_price'] > 0 && $row['variants'][0]['sale_final_price'] != '') ? $row['variants'][0]['sale_final_price'] : $row['variants'][0]['price'];
                                                } else {
                                                    $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                                }
                                                $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                                $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                                $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                                if (count($row['variants']) <= 1) {
                                                    $variant_id = $row['variants'][0]['id'];
                                                    $modal = "";
                                                } else {
                                                    $variant_id = "";
                                                    $modal = "#quickview";
                                                }
                                                ?>
                                                <a class="btn add-in-cart-btn w-100 add_to_cart quickview-trigger" href="" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $row['name'] ?>" data-product-image="<?= $row['image'] ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= $row['short_description']; ?>" data-bs-toggle="modal" data-bs-target="<?= $modal ?>">
                                                    <span class="add-in-cart">Add to Cart</span>
                                                    <span class="add-in-cart-icon">
                                                        <i class="fa-solid fa-cart-shopping color-white"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </a>
                                        <div class="product-icon-onhover">
                                            <div class="product-icon-spacebtw">
                                                <div class="shuffle-box">
                                                    <a class="compare text-reset text-decoration-none shuffle" data-tip="Compare" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                                        <ion-icon name="shuffle-outline" class="ion-icon-hover pointer shuffle"></ion-icon>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-icon-spacebtw">
                                                <div class="quick-search-box quickview-trigger" data-tip="Quick View" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $row['variants'][0]['id'] ?>" data-izimodal-open="#quickview">
                                                    <ion-icon name="search-outline" class="ion-icon-hover pointer" data-bs-toggle="modal" data-bs-target="#quickview"></ion-icon>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php if ((!isset($sub_categories) || empty($sub_categories)) && (!isset($products) || empty($products['product']))) { ?>
                <div class="col-12 py-4 text-center">
                    <h1 class="h2">No Products Found.</h1>
                    <a href="<?= base_url('products') ?>" class="btn btn-primary"><?= label($this->lang->line('go_to_shop')) ? $this->lang->line('go_to_shop') : 'Go to Shop' ?></a>
                </div>
            <?php } ?>
            <?php if (isset($sub_categories) && !empty($sub_categories)) { ?>
                <div class="mb-4">
                    <?php if (isset($single_category) && !empty($single_category)) { ?>
                        <h3 class="section-title"><?= $single_category['name'] ?> <?= label('category', 'category') ?></h3>
                    <?php } ?>
                </div>
                <div class="category-section container-fluid text-center">
                    <div class="row g-4">
                        <?php foreach ($sub_categories as $key => $row) { ?>
                            <div class="col-xl-4 col-md-6 col-12">
                                <a href="<?= base_url('products/category/' . html_escape($row->slug)) ?>">
                                    <div class="categorises-container">
                                        <div class="categorises-banner-img">
                                            <img src="<?= $row->image ?>" alt="">
                                        </div>
                                        <div class="overlay"></div>
                                        <div class="category-body text-start">
                                            <h3><?= html_escape($row->name) ?></h3>
                                            <button class="btn btn-primary explore-btn"><?= label('explore', 'Explore') ?></button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <nav aria-label="Page navigation example">
            <?= (isset($links)) ? $links : '' ?>
        </nav>
    </section>

    <!-- sort by -->
    <?php if (isset($products) && !empty($products['product'])) { ?>
        <div class="offcanvas offcanvas-bottom" tabindex="-1" id="sort-by" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title" id="offcanvasBottomLabel"><?= label('sort_by', 'Sort By') ?></h6>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="form-check">
                    <label class="form-check-label py-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="Relevance" checked>
                        <?= label('relevance', 'Relevance') ?>
                    </label>
                    <label class="form-check-label py-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="top-rated" <?= ($this->input->get('sort') == "top-rated") ? 'checked' : '' ?>>
                        <?= label('top_rated', 'Top Rated') ?>
                    </label>
                    <label class="form-check-label py-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="date-desc" <?= ($this->input->get('sort') == "date-desc") ? 'checked' : '' ?>>
                        <?= label('newest_first', 'Newest First') ?>
                    </label>
                    <label class="form-check-label py-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="date-asc" <?= ($this->input->get('sort') == "date-asc") ? 'checked' : '' ?>>
                        <?= label('oldest_first', 'Oldest First') ?>
                    </label>
                    <label class="form-check-label py-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="price-asc" <?= ($this->input->get('sort') == "price-asc") ? 'checked' : '' ?>>
                        <?= label('price_low_to_high', 'Price - Low To High') ?>
                    </label>
                    <label class="form-check-label py-1">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="price-desc" <?= ($this->input->get('sort') == "price-desc") ? 'checked' : '' ?>>
                        <?= label('price_high_to_low', 'Price - High To Low') ?>
                    </label>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- filter -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="filter" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header justify-content-start p-2">
            <button type="button" class="btn p-0" data-bs-dismiss="offcanvas" aria-label="Close">
                <ion-icon name="arrow-back-outline" size="large"></ion-icon>
            </button>
            <h6 class="offcanvas-title px-3" id="offcanvasBottomLabel"><?= label('filter', 'Filter') ?></h6>
        </div>
        <div class="offcanvas-body filter-section-body row p-0">
            <?php if (isset($products['filters']) && !empty($products['filters'])) { ?>
                <div class="col-5 pe-0 overflow-auto" id="product-filters-mobile">
                </div>
                <div class="col-7 px-3 overflow-auto">
                    <div class="tab-content" id="product-filters-mobile-value">

                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="offcanvas-footer d-flex align-items-center justify-content-end">
            <button type="submit" class="apply-btn mx-3 product_filter_btn"><?= label('apply', 'Apply') ?></button>
        </div>
    </div>
</main>