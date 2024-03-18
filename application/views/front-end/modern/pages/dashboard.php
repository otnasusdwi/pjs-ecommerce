<main>
    <section class="container py-5">
        <div class="row">
            <div class="col-md-3 myaccount-navigation py-3">
                <?php $this->load->view('front-end/' . THEME . '/pages/my-account-sidebar') ?>
            </div>
            <div class="col-md-9 padding-16-30">
                <div class="dashboard-text">
                    <p><?= label('hello', 'Hello') ?> <strong><?= $user->username ?></strong></p>
                    <p>From your account dashboard you can view your <a href="<?= base_url('my-account/orders') ?>"> recent orders</a>, manage your <a href="<?= base_url('my-account/manage-address') ?>">shipping and billing addresses</a>, and <a href="<?= base_url('my-account/profile') ?>"> edit your password and
                            account details.</a></p>
                    <div class="dashboard-links row py-3">
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/orders') ?>">
                                <div class="p-3">
                                    <i class="ionicon-receipt-outline"></i>
                                    <p class="m-0"><?= label('orders', 'Orders') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/notifications') ?>">
                                <div class="p-3">
                                    <i class="ionicon-notifications-outline"></i>
                                    <p class="m-0"><?= label('notification', 'Notifications') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/manage-address') ?>">
                                <div class="p-3">
                                    <i class="ionicon-location-outline"></i>
                                    <p class="m-0"><?= label('address', 'Addresses') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/profile') ?>">
                                <div class="p-3">
                                    <i class="ionicon-person-circle-outline"></i>
                                    <p class="m-0"><?= label('account_details', 'Account Details') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/favorites') ?>">
                                <div class="p-3">
                                    <i class="ionicon-heart-outline-2"></i>
                                    <p class="m-0"><?= label('wishlist', 'Wishlist') ?></p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/transactions') ?>">
                                <div class="p-3">
                                    <i class="ionicon-map-outline"></i>
                                    <p class="m-0"><?= label('transactions', 'Transactions') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/refer_and_earn') ?>">
                                <div class="p-3">
                                    <i class="ionicon-cash-outline"></i>
                                    <p class="m-0"><?= label('refer_and_earn', 'Refer and earn') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('my-account/wallet') ?>">
                                <div class="p-3">
                                    <i class="ionicon-wallet-outline"></i>
                                    <p class="m-0"><?= label('wallet', 'Wallet') ?></p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 dashboard-links-container">
                            <a href="<?= base_url('login/logout') ?>">
                                <div class="p-3">
                                    <i class="ionicon-log-out-outline"></i>
                                    <p class="m-0"><?= label('logout', 'Logout') ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>