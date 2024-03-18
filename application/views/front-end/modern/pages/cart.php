<main>
    <section class="container py-4">
        <div class="cart-page-title">
            <div class="checkout-step justify-content-around py-5   ">
                <a href="cart">
                    <h3 class="step-active"><?= label('shopping_cart', 'SHOPPING CART') ?></h3>
                </a>
                <i class="fa-solid fa-arrow-right-long d-md-block d-none"></i>
                <a href="cart/checkout">
                    <h3 class="d-md-block d-none"><?= label('checkout', 'CHECKOUT') ?></h3>
                </a>
                <i class="fa-solid fa-arrow-right-long d-md-block d-none"></i>
                <h3 class="d-md-block d-none"><?= label('order_complete', 'ORDER COMPLETE') ?></h3>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-xl-8">
                <div class="mb-4 cart-table">
                    <table id="cart_item_table" class="table w-100 mb-4">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"><?= label('product', 'PRODUCT') ?></th>
                                <th scope="col"><?= label('price', 'PRICE') ?></th>
                                <th scope="col"><?= label('quantity', 'QUANTITY') ?></th>
                                <th scope="col"><?= label('subtotal', 'SUBTOTAL') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $key => $row) {
                                //  echo "<pre>";
                                //  print_r($row['product_variants'][0]['variant_values']);
                                //  echo "</pre>";
                                if (isset($row['qty']) && $row['qty'] != 0) {
                                    if ($row['sale_price'] != 0) {
                                        $price = $row['sale_price'];
                                    } else {
                                        $price = $row['special_price'] != '' && $row['special_price'] != null && $row['special_price'] > 0 ? $row['special_price'] : $row['price'];
                                    }
                            ?>
                                    <tr>
                                        <td class="product-removal">
                                            <ion-icon name="close-outline" class="remove-product pointer" id="remove_inventory" data-id="<?= $row['id']; ?>" title="Remove From Cart"></ion-icon>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('products/details/' . $row['slug']) ?>" target="_blank">
                                                <div class="product-thumbnail">
                                                    <img src="<?= $row['image'] ?>" alt="<?= $row['name']; ?>">
                                                </div>
                                            </a>
                                        </td>
                                        <div class="id">
                                            <input type="hidden" name="<?= 'id[' . $key . ']' ?>" id="id" value="<?= $row['id'] ?>">
                                        </div>
                                        <td>
                                            <p class="product-name"><?= $row['name'] ?></p>
                                            <p class="product-disc"><?= $row['short_description'] ?></p>
                                            <p class="product-disc text-capitalize <?= isset($row['product_variants'][0]['variant_values']) ? "d-block" : "d-none" ?>"><?= isset($row['product_variants'][0]['variant_values']) ? $row['product_variants'][0]['variant_values'] : "" ?></p>
                                        </td>
                                        <td class="product-price">
                                            <span class="d-md-none d-block"><?= label('price', 'PRICE') ?></span>
                                            <p><?= $settings['currency'] . number_format($price, 2) ?></p>
                                        </td>
                                        <td class="product-quantity">
                                            <span class="d-md-none d-block"><?= label('quantity', 'QUANTITY') ?></span>
                                            <div class="input-group plus-minus-input mb-3 num-block">
                                                <?php $check_current_stock_status = validate_stock([$row['id']], [$row['qty']]); ?>
                                                <?php if (isset($check_current_stock_status['error'])  && $check_current_stock_status['error'] == TRUE) { ?>
                                                    <div><span class='text text-danger'> Out of Stock </span></div>
                                                <?php } else { ?>
                                                    <div class="num-in d-flex">
                                                        <?php $price ?>
                                                        <div class="input-group-button">
                                                            <button type="button" class="button hollow circle minus-btn minus dis" data-quantity="minus" data-min="<?= (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1 ?>" data-step="<?= (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1 ?>">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                        </div>
                                                        <input class="input-group-field input-field-cart-modal in-num itemQty" type="number" name="qty" data-page="cart" data-id="<?= $row['id']; ?>" value="<?= $row['qty'] ?>" data-price="<?= $price ?>" data-step="<?= (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1 ?>" data-min="<?= (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1 ?>" data-max="<?= (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : '' ?>">
                                                        <div class="input-group-button">
                                                            <button type="button" class="button hollow circle plus-btn plus" data-quantity="plus" data-max="<?= (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : '0' ?> " data-step="<?= (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1 ?>">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td class="product-subtotal total-price">
                                            <span class="d-md-none d-block"><?= label('subtotal', 'SUBTOTAL') ?></span>
                                            <p class="product-line-price"><?= $settings['currency'] . number_format(($row['qty'] * $price), 2) ?></p>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="cart-total d-xl-none">
                    <div class="cart-titles"><?= label('Cart Totals', 'Cart Totals') ?></div>
                    <table class="table cart-total-table">
                        <tbody>
                            <?php $total = !empty($cart['sub_total']) ? number_format($cart['overall_amount'] - $cart['delivery_charge'], 2) : 0 ?>
                            <tr class="order-total">
                                <th><?= label('total', 'Total') ?></th>
                                <td>
                                    <p><?= $settings['currency'] . '<span class="final_total"> ' . $total . '</span>' ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="cart/checkout">
                        <button class="btn btn-primary w-100"><?= label('proceed_to_checkout', 'Proceed to checkout') ?></button>
                    </a>
                </div>
                <div class="py-4">
                    <div class="align-items-center d-flex flex-wrap justify-content-between">
                        <h1 class="section-title  pointer">You May Be Interested In…</h1>
                    </div>
                    <div class="swiper mySwiper6 swiper-arrow swiper-wid ">
                        <div class="swiper-wrapper grab">
                            <?php foreach ($related_products['product'] as $row) { ?>
                                <div class="swiper-slide background-none">
                                    <a href="<?= base_url('products/details/' . $row['slug']) ?>" class="text-reset text-decoration-none">
                                        <div class="card card-h-418 product-card" data-product-id="<?= $row['id'] ?>">
                                            <div class="product-img">
                                                <img src="<?= $row['image_sm'] ?>" class="card-img-top pic-1" alt="...">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $row['name'] ?></h4>
                                                <p class="card-text"><?= output_escaping(str_replace('\r\n', '&#13;&#10;', word_limit($row['category_name']))) ?></p>
                                                <div class="d-flex flex-column">
                                                    <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                    <h4 class="card-price">
                                                        <?php if ($row['is_on_sale'] == 1) { ?>
                                                            <?php
                                                            echo $settings['currency'] . '' . $row['variants'][0]['sale_final_price']; ?>
                                                        <?php } else { ?>
                                                            <?php echo $settings['currency'] . ' ' . $row['variants'][0]['price']; ?>
                                                        <?php } ?>
                                                    </h4>
                                                    <?php
                                                    if (count($row['variants']) <= 1) {
                                                        $variant_id = $row['variants'][0]['id'];
                                                        $modal = "";
                                                    } else {
                                                        $variant_id = "";
                                                        $modal = "#quickview";
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($row['is_on_sale'] == 1) {
                                                        $variant_price = ($row['variants'][0]['sale_final_price'] > 0 && $row['variants'][0]['sale_final_price'] != '') ? $row['variants'][0]['sale_final_price'] : $row['variants'][0]['price'];
                                                    } else {
                                                        $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                                    }
                                                    $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                                    $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                                    $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                                    ?>
                                                </div>
                                                <a href="#" class="btn add-in-cart-btn w-100 add_to_cart quickview-trigger" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $row['name'] ?>" data-product-image="<?= $row['image'] ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= $row['short_description']; ?>" data-bs-toggle="modal" data-bs-target="<?= $modal ?>"><span class="add-in-cart">Add to
                                                        Cart</span><span class="add-in-cart-icon"><i class="fa-solid fa-cart-shopping
                                        color-white"></i></span></a>
                                            </div>
                                            <div class="product-icon-onhover">
                                                <div class="product-icon-spacebtw">
                                                    <div class="shuffle-box">
                                                        <a class="compare text-reset text-decoration-none shuffle" data-tip="Compare" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                                            <ion-icon name="shuffle-outline" class="ion-icon-hover pointer shuffle"></ion-icon>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-icon-spacebtw">
                                                    <div class="add-to-fav-btn" title="like" data-product-id="<?= $row['id'] ?>">
                                                        <ion-icon class="ion-icon ion-icon-hover <?= ($row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                                    </div>
                                                </div>
                                                <div class="product-icon-spacebtw">
                                                    <div class="quick-search-box quickview-trigger" data-tip="Quick View" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $row['variants'][0]['id'] ?>" data-izimodal-open="#quick-view">
                                                        <ion-icon name="search-outline" class="ion-icon-hover pointer" data-bs-toggle="modal" data-bs-target="#quickview"></ion-icon>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                        <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 pb-4 position-sticky align-self-start top-0">
                <div class="cart-total d-xl-block d-none">
                    <div class="cart-titles"><?= label('Cart Totals', 'Cart Totals') ?></div>
                    <table class="table cart-total-table">
                        <tbody>
                            <?php $total = !empty($cart['sub_total']) ? number_format($cart['overall_amount'] - $cart['delivery_charge'], 2) : 0 ?>
                            <tr class="order-total">
                                <th><?= label('total', 'Total') ?></th>
                                <td>
                                    <p><?= $settings['currency'] . '<span class="final_total"> ' . $total . '</span>' ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="cart/checkout">
                        <button class="btn btn-primary w-100"><?= label('proceed_to_checkout', 'Proceed to checkout') ?></button>
                    </a>
                </div>
                <div class="Delivery-Return-help-section">
                    <div class="cart-titles">Delivery & Return</div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    My order hasn't arrived yet. Where is it?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    How can you evaluate content without design? No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    My order hasn't arrived yet. Where is it?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    To short sentences, to many headings, images too large for the proposed design, or too small, or they fit in but it looks iffy for reasons the folks in the meeting can’t quite tell right now, but they’re unhappy, somehow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do you deliver to my postcode?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    How can you evaluate content without design? No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Is next-day delivery available on all orders?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    To short sentences, to many headings, images too large for the proposed design, or too small, or they fit in but it looks iffy for reasons the folks in the meeting can’t quite tell right now, but they’re unhappy, somehow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Do I need to be there to sign for delivery?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    How can you evaluate content without design? No typography, no colors, no layout, no styles, all those things that convey the important signals that go beyond the mere textual, hierarchies of information, weight.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>