<main>
    <section class="container py-4">
        <div class="row order-detail-box mb-3">
            <div class="col-lg-4">
                <div>
                    <h5><?= label('order_detail', 'Order Detail') ?></h5>
                    <p class="text-muted"><?= label('order_id', 'order_Id') ?> <span class="fw-bold text-dark"> : <?= $order['id'] ?></span> </p>
                    <p class="text-muted"><?= label('place_on', 'Place On') ?><span class="fw-bold text-dark"> : <?= $order['date_added'] ?></span> </p>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div>
                    <h5><?= label('shipping_details', 'Shipping Details') ?></h5>
                    <p class="fw-bold text-dark"><?= $order['username'] ?></p>
                    <p><?= $order['address'] ?></p>
                    <p class="fw-bold text-dark"><?= label('mobile_number', 'Phone Number') ?></p>
                    <p><?= $order['mobile'] ?></p>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div>
                    <h5><?= label('more_actions', 'More Actions') ?></h5>
                    <div class="d-flex flex-wrap justify-content-between">
                        <p class="fw-semibold"><i class="ionicon-file invoice-icon"></ion-icon></i><?= label('Download Invoice', 'Download Invoice') ?></p>
                        <a target="_blank" href="<?= base_url('my-account/order-invoice/' . $order['id']) ?>" class='btn btn-primary'><?= label('invoice', 'Invoice') ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row order-detail-box">
            <div class="col-lg-3">
                <?php foreach ($order['order_items'] as $key => $item) { ?>
                    <div class="row my-2">
                        <div class="col-5 img-box-100">
                            <img class="align-self-center img-fluid" src="<?= $item['image_sm'] ?>" width="120 " height="120">
                        </div>
                        <div class="col-7">
                            <h6 class="order-detail-title"><?= $item['name'] ?></h6>
                            <p class="m-0"><small class="card-text"><?= $item['variant_name'] ?></small></p>
                            <p class="m-0"><small class="card-text"><?= label('quantity', 'quantity') ?> : <?= $item['quantity'] ?></small></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <h5><?= label('price_details', 'Price Details') ?></h5>
                <p><?= label('total_order_price', 'Total Order Price') ?> : <?= $settings['currency'] . ' ' . number_format($order['total'], 2) ?></p>
                <?php if ($item['type'] != 'digital_product') { ?>
                    <p><?= label('delivery_charge', 'Delivery Charge') ?> : <?= $settings['currency'] . ' ' . number_format($order['delivery_charge'], 2) ?>
                    </p>
                <?php } ?>
                <p class="d-none"><?= label('wallet_used', 'Wallet Used') ?> : - <?= $settings['currency'] . ' ' . number_format($order['wallet_balance'], 2) ?></p>
                <p class="d-none"><?= label('tax', 'Tax') ?> : - (<?= $order['total_tax_percent'] ?>%) + <?= $settings['currency'] . ' ' . number_format($order['total_tax_amount'], 2) ?></p>
                <?php if (!empty($order['promo_code']) && !empty($order['promo_discount'])) { ?>
                    <p><?= label('view_more', 'View More') ?>Promocode Discount : - (<?= $order['promo_code'] ?>) - <?= $settings['currency'] . ' ' . number_format($order['promo_discount'], 2) ?>
                    </p>
                <?php } ?>
                <p class="fw-bold text-dark"><?= label('final_total', 'Final Total') ?> : <?= $settings['currency'] . ' ' . number_format($order['final_total'], 2) ?> <span class="small text-muted"> <?= !empty($this->lang->line('via')) ? $this->lang->line('via') : 'via' ?> (<?= $order['payment_method'] ?>) </span></p>
            </div>

            <?php if ($item['type'] != 'digital_product') { ?>
                <div class="col-lg-12 mt-4">
                    <div class="d-md-flex d-block row justify-content-around mb-4" id="progressbar">
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

                            <div class="active active col-2 d-md-block d-flex ms-md-0 ms-4 mb-md-0 mb-4 progressbar-box <?= $class ?>" id="step<?= $i ?>">
                                <div id="steps">
                                    <div class="step done"><i class="fa fa-check"></i></div>
                                </div>
                                <!-- <div class="line-active"></div> -->
                                <?php
                                $status_value = str_replace('_', ' ', $value[0]);
                                ?>
                                <div class="ms-md-0 ms-4">
                                    <p class="mt-2"><?= strtoupper($status_value) ?></p>
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
                </div>
            <?php } ?>
        </div>
        <div class="justify-content-center mt-3 row gap-2">
            <?php
            $status = ["awaiting", "received", "processed", "shipped", "delivered", "cancelled", "returned"];
            $cancelable_till = $item['cancelable_till'];
            $active_status = $item['active_status'];
            $cancellable_index = array_search($cancelable_till, $status);
            $active_index = array_search($active_status, $status);
            if (!$item['is_already_cancelled'] && $item['is_cancelable'] && $active_index <= $cancellable_index && $item['type'] != 'digital_product') { ?>
                <button class="btn btn-primary update-order-item w-auto" data-status="cancelled" data-item-id="<?= $item['id'] ?>"><?= !empty($this->lang->line('cancel')) ? $this->lang->line('cancel') : 'Cancel' ?></button>
            <?php } ?>
            <?php $order_date = $order['order_items'][0]['status'][3][1];
            if ($order['is_returnable'] && !$order['is_already_returned'] && isset($order_date) && !empty($order_date)) { ?>
                <?php
                $settings = get_settings('system_settings', true);
                $timestemp = strtotime($order_date);
                $date = date('Y-m-d', $timestemp);
                $today = date('Y-m-d');
                $return_till = date('Y-m-d', strtotime($order_date . ' + ' . $settings['max_product_return_days'] . ' days'));
                if ($today < $return_till && $item['type'] != 'digital_product') { ?>
                    <button class="update-order btn btn-danger w-auto" data-status="returned" data-order-id="<?= $order['id'] ?>"><?= !empty($this->lang->line('return')) ? $this->lang->line('return') : 'Return' ?></button>
                <?php } ?>
            <?php } ?>
            <?php if ($order['payment_method'] == "Bank Transfer") { ?>
                <div class="row">
                    <form class="form-horizontal " id="send_bank_receipt_form" action="<?= base_url('cart/send-bank-receipt'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                        <input type="hidden" name="<?=  $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash()?>">
                        <div class="form-group mb-2">
                            <label for="receipt" class="fw-semibold"><?= !empty($this->lang->line('bank_payment_receipt')) ? $this->lang->line('bank_payment_receipt') : 'Bank Payment Receipt' ?></label>
                            <input type="file" class="form-control" name="attachments[]" id="receipt" multiple required />
                        </div>
                        <div class="form-group mt-2">
                            <button type="reset" class="btn btn-warning"><?= !empty($this->lang->line('reset')) ? $this->lang->line('reset') : 'Reset' ?></button>
                            <button type="submit" class="btn btn-success" id="submit_btn"><?= !empty($this->lang->line('send')) ? $this->lang->line('send') : 'Send' ?></button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="row">
                <?php if (!empty($bank_transfer)) {  ?>
                    <div class="col-md-12">
                        <?php $i = 1;
                        foreach ($bank_transfer as $row1) { ?>
                            <small>[<a href="<?= base_url() . $row1['attachments'] ?>" target="_blank"><?= !empty($this->lang->line('attachment')) ? $this->lang->line('attachment') : ' Attachment' ?> <?= $i ?> </a>]</small>
                        <?php $i++;
                        } ?>
                    </div>
                <?php } ?>
            </div>
            <div>
                <?php
                if ($bank_transfer[0]['status'] == 0) { ?>
                    <label class="bg-body-secondary fw-semibold h-auto p-2 text-black w-auto"><?= !empty($this->lang->line('pending')) ? $this->lang->line('pending') : 'Verification Pending' ?></label>
                <?php } else if ($bank_transfer[0]['status'] == 1) { ?>
                    <label class="bg-body-secondary fw-semibold h-auto p-2 text-black w-auto"><?= !empty($this->lang->line('rejected')) ? $this->lang->line('rejected') : 'Verification Rejected' ?></label>
                <?php } else if ($bank_transfer[0]['status'] == 2) { ?>
                    <label class="bg-body-secondary fw-semibold h-auto p-2 text-black w-auto"><?= !empty($this->lang->line('accepted')) ? $this->lang->line('accepted') : 'Verification Accepted' ?></label>
                <?php } else { ?>
                    <label class="bg-body-secondary fw-semibold h-auto p-2 text-black w-auto"><?= !empty($this->lang->line('invalid_value')) ? $this->lang->line('invalid_value') : 'Invalid Value' ?></label>
                <?php } ?>
            </div>
            <?php if ($item['type'] == 'digital_product' &&  $item['download_allowed'] == 1) {
                $download_link = $item['hash_link'];
                $is_download =   fetch_details('order_items', ['id' => $item['id']], 'is_download');
                // print_R($is_download);
            ?>
                <?php
                if ($bank_transfer[0]['status'] == 2) {
                    if ($is_download[0]['is_download'] == 0) { ?>
                        <div class="media-body mt-3">
                            <a href="<?= base_url('products/download_link_hash/' . $item['id']) ?>" title="Download Product" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                        </div>
                    <?php } else { ?>
                        <span class="text-danger">The item which you had purchased has been downloaded already!</span>
                <?php }
                } ?>
            <?php }
            if ($item['type'] == 'digital_product' &&  $item['download_allowed'] == 0) { ?>
                <div class="media-body mt-3">
                    <span class="text-danger">You will receive this item from seller via email.</span>

                </div>
            <?php } ?>
        </div>
    </section>
</main>