<main>
    <section class="container py-5">
        <div class="row">
            <div class="col-lg-3 myaccount-navigation py-3">
                <?php $this->load->view('front-end/' . THEME . '/pages/my-account-sidebar') ?>
            </div>
            <div class="col-lg-9 padding-16-30">
                <div class="mb-3">
                    <h4 class="section-title"><?= label('orders', 'Orders') ?></h4>
                </div>
                <?php
                if (empty($orders['order_data'])) { ?>
                    <div class="col-lg-11 m-5">
                        <div class="text-center">
                            <i class="ionicon-cart-outline-2"></i>
                            <h5 class="h2"><?= label('no_order_has_been_made_yet', 'No order has been made yet') ?>.</h5>
                            <a href="<?= base_url('products') ?>" class="button button-rounded button-warning">
                                <button class="btn btn-primary">
                                    <?= label('go_to_shop', 'Go to Shop') ?>
                                </button>
                            </a>
                        </div>
                    </div>
                    <?php
                } else {
                    foreach ($orders['order_data'] as $row) {
                        $images = $row['order_items']; ?>
                        <div class="card order-card mb-3">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <?php foreach ($images as $item) {  ?>
                                        <div class="img-box-150">
                                            <img src="<?= $item['image_sm'] ?>" class="img-fluid rounded-start p-2" alt="...">
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-4">
                                    <?php foreach ($row['order_items'] as $key => $item) { ?>
                                        <div class="card-body mx-3">
                                            <h6 class="card-title"><?= $item['name'] ?></h6>
                                            <p class="m-0"><small class="card-text"><?= $item['variant_name'] ?></small></p>
                                            <p class="m-0"><small class="card-text"><?= label('quantity', 'quantity') ?> : <?= $item['quantity'] ?></small></p>
                                            <p class="m-0"><small class="card-text"><?= label('order_id', 'Order ID') ?> : <?= $row['id'] ?></small></p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-body">
                                        <h4 class="card-price"><i><?= $settings['currency'] ?></i></span> <?= number_format($row['final_total'], 2) ?></h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <h6 class="card-title"><ion-icon name="ellipse" class="text-success"></ion-icon> <?= $item['active_status'] ?></h6>
                                        <p><small class="card-text"><?= label('place_on', 'Place On') ?> : <?= $row['date_added'] ?></small></p>
                                        <h5 class="btn viewmorebtn p-2">
                                            <a href="<?= base_url('my-account/order-details/' . $row['id']) ?>">
                                                <?= label('view_details', 'View details') ?>
                                            </a>
                                        </h5>
                                        <?php
                                        $items = $row["order_items"];
                                        $variants = "";
                                        $qty = "";
                                        foreach ($items as $item) {
                                            if ($variants != "") {
                                                $variants .= ",";
                                                $qty .= ",";
                                            }
                                            $variants .= $item["product_variant_id"];
                                            $qty .= $item["quantity"];
                                        }

                                        ?>
                                        <h5 class="btn btn-lg btn-primary mx-2">
                                            <a class="reorder-btn block button-lg buttonss text-white m-0" data-variants="<?= $variants ?>" data-quantity="<?= $qty ?>"><?= label('reorder', 'Reorder') ?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php if ($row['order_items'][0]['type'] != 'digital_product') { ?>
                                <div class="d-md-flex d-block row justify-content-around mt-2 mb-4" id="progressbar">
                                    <?php
                                    $pickup = ($row['is_local_pickup'] == 1) ? 'ready_to_pickup' : 'shipped';
                                    $status = array('received', 'processed', $pickup, 'delivered');
                                    $i = 1;
                                    foreach ($item['status'] as $value) { ?>
                                        <?php
                                        $class = '';
                                        if ($value[0] == "cancelled" || $value[0] == "returned") {
                                            $class = 'cancel';
                                            $status = array();
                                        } elseif (($ar_key = array_search($value[0], $status)) !== false) {
                                            unset($status[$ar_key]);
                                        }
                                        ?>

                                        <div class="active d-md-block d-flex ms-md-0 ms-4 mb-md-0 mb-4 col-2 progressbar-box <?= $class ?>" id="step<?= $i ?>">
                                            <div id="steps">
                                                <div class="step done"><i class="fa fa-check"></i></div>
                                            </div>
                                            <!-- <div class="line-active"></div> -->
                                            <div class="ms-md-0 ms-4">
                                                <p class="mt-2"><?= strtoupper($value[0]) ?></p>
                                                <p><?= $value[1] ?></p>
                                            </div>
                                        </div>
                                    <?php
                                        $i++;
                                    } ?>
                                    <?php foreach ($status as $value) { ?>
                                        <div class="col-2 d-md-block d-flex ms-md-0 ms-4 mb-md-0 mb-4 progressbar-box" id="step<?= $i ?>">
                                            <div id="steps">
                                                <div class="step"><i class="ionicon-ellipse"></i></div>
                                            </div>
                                            <!-- <div class="line"></div> -->
                                            <div class="ms-md-0 ms-4">
                                                <p class="mt-2"><?= strtoupper($value) ?></p>
                                            </div>
                                        </div>
                                    <?php $i++;
                                    } ?>

                                </div>
                            <?php } ?>
                            <div class="row text-center ">
                                <?php
                                $status = ["awaiting", "received", "processed", "shipped", "delivered", "cancelled", "returned"];
                                $cancelable_till = $item['cancelable_till'];
                                $active_status = $item['active_status'];
                                $cancellable_index = array_search($cancelable_till, $status);
                                $active_index = array_search($active_status, $status);
                                if (!$item['is_already_cancelled'] && $item['is_cancelable'] && $active_index <= $cancellable_index) { ?>
                                    <div class="col my-auto">
                                        <h5 class="btn btn-primary">
                                            <a class="update-order block button-sm buttons btn-6-1 text-white mt-3 m-0" data-status="cancelled" data-order-id="<?= $row['id'] ?>"><?= label('cancel', 'Cancel') ?></a>
                                        </h5>
                                    </div>
                                <?php } ?>
                                <?php
                                $order_date = $row['order_items'][0]['status'][3][1];
                                if ($row['is_returnable'] && !$row['is_already_returned'] && isset($order_date) && !empty($order_date)) { ?>
                                    <?php
                                    $settings = get_settings('system_settings', true);
                                    $timestemp = strtotime($order_date);
                                    $date = date('Y-m-d', $timestemp);
                                    $today = date('Y-m-d');
                                    $return_till = date('Y-m-d', strtotime($order_date . ' + ' . $settings['max_product_return_days'] . ' days'));
                                    echo "<br>";
                                    if ($today < $return_till) { ?>
                                        <div class="col my-auto ">
                                            <h5 class="btn btn-primary">
                                                <a href="<?= base_url('my-account/order-details/' . $row['id']) ?>" class="update-order block buttons button-sm btn-6-3 text-white mt-3 m-0" data-status="returned" data-order-id="<?= $row['id'] ?>"><?= label('return', 'Return') ?></a>
                                            </h5>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($row['payment_method'] == 'Bank Transfer') { ?>
                                    <div class="col my-auto ">
                                        <h5 class="btn btn-primary">
                                            <a class="block button-sm buttons btn-6-5 text-white mt-3 m-0" href="<?= base_url('my-account/order-details/' . $row['id']) ?>"><?= label('send_bank_payment_receipt', 'Send Bank Payment Receipt') ?></i>
                                                <!-- <input type="file"  name="receipt" class="form-control"/>  -->
                                            </a>
                                        </h5>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>
</main>