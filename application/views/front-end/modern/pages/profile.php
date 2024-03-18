<main>
    <section class="container py-5">
        <div class="row">
            <div class="col-md-3 myaccount-navigation py-3">
                <?php $this->load->view('front-end/' . THEME . '/pages/my-account-sidebar') ?>
            </div>
            <div class="col-md-9 padding-16-30">
                <form class="form-submit-event" method="POST" action="<?= base_url('login/update_user') ?>">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div>
                                <label for="username" class="form-label">
                                <?= label('username', 'Username') ?> </label>
                                <input type="text" class="form-control gray-700" id="username" name="username" placeholder="Username" value="<?= $users->username ?>">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <?php if ($identity_column == 'email') { ?>
                                <div>
                                    <label for="email" class="form-label">
                                        <?= label('email', 'Email Address') ?><sup class="text-danger fw-bold"> *</sup>
                                    </label>
                                    <input type="text" class="form-control gray-700" id="email" name="email" value="<?= $users->email ?>" readonly>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-md-6">
                                    <label for="mobile" class="form-label"><?= !empty($this->lang->line('mobile')) ? $this->lang->line('mobile') : 'Mobile' ?>*</label>
                                    <div>
                                        <input type="phone" class="form-control gray-700" id="mobile" placeholder="Mobile No. here" name="mobile" value="<?= $users->mobile ?>" readonly>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mt-4 p-4 password-update-section">
                        <h5 class="fw-bold mb-4"><?= label('password_change', 'Password Change') ?></h5>
                        <?php
                        // echo 'herewe';
                        $type = fetch_details('users', ['id' => $_SESSION['user_id']], ['type']);
                        // print_r($type[0]['type']);
                        if ($type[0]['type'] == 'phone') {
                        ?>
                            <div>
                                <div class="mb-4">
                                    <label for="old" class="form-label">
                                        <?= label('current_password', 'Current password') ?>
                                    </label>
                                    <input type="text" class="form-control gray-700" id="old" name="old">
                                </div>
                                <div class="mb-4">
                                    <label for="new" class="form-label">
                                        <?= label('new_password', 'New password') ?>
                                    </label>
                                    <input type="password" class="form-control gray-700" id="new" name="new">
                                </div>
                                <div class="mb-4">
                                    <label for="new_confirm" class="form-label">
                                        <?= label('confirm_new_password', 'Confirm new password') ?>
                                    </label>
                                    <input type="text" class="form-control gray-700" id="new_confirm" name="new_confirm">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn submit-btn mt-4 submit_btn"><?= label('save_changes', 'Save Changes') ?></button>
                    <div class="d-flex justify-content-center mt-3">
                        <div class="form-group" id="error_box">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>