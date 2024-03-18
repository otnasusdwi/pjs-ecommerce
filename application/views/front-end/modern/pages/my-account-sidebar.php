<?php $current_url = current_url(); ?>
<main>
    <h4 class="border-bottom section-title">
        <?= label('my_account', 'My Account') ?></h4>
    <ul class="list-unstyled">
        <a href="<?= base_url('my-account') ?>">
            <li class="dashboard <?= ($current_url == base_url('my-account')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('dashboard', 'Dashboard') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/orders') ?>">
            <li class="<?= ($current_url == base_url('my-account/orders')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('orders', 'Orders') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/notifications') ?>">
            <li class="<?= ($current_url == base_url('my-account/notifications')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('notification', 'Notifications') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/manage-address') ?>">
            <li class="<?= ($current_url == base_url('my-account/manage-address')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('address', 'Addresses') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/profile') ?>">
            <li class="<?= ($current_url == base_url('my-account/profile')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('account_detail', 'Account Detail') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/favorites') ?>">
            <li class="<?= ($current_url == base_url('my-account/favorites')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('wishlist', 'Wishlist') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/transactions') ?>">
            <li class="<?= ($current_url == base_url('my-account/transactions')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('transactions', 'Transactions') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/tickets') ?>">
            <li class="<?= ($current_url == base_url('my-account/tickets')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('customer_support', 'Customer Support') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/refer_and_earn') ?>">
            <li class="<?= ($current_url == base_url('my-account/refer_and_earn')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('refer_and_earn', 'Refer and earn') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/wallet') ?>">
            <li class="<?= ($current_url == base_url('my-account/wallet')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('wallet', 'wallet') ?>
            </li>
        </a>
        <a href="<?= base_url('my-account/delete_user') ?>">
            <li class="<?= ($current_url == base_url('my-account/delete_user')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('delete_account', 'Delete Account') ?>
            </li>
        </a>
        <a href="<?= base_url('login/logout') ?>">
            <li class="<?= ($current_url == base_url('login/logout')) ? 'myaccount-navigation-link-selected' : '' ?>">
                <?= label('logout', 'Logout') ?>
            </li>
        </a>
    </ul>
</main>