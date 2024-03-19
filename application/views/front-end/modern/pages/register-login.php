    <?php
    $registrationSectionDisplay = 'none';
    $loginSectionDisplay = 'none';
    $verifyOtpForm = 'none';
    $signUpForm = 'none';
    ?>
    <main>
        <section class="container my-5">
            <div class="row register-login-section">
                <!-- registration section-->
                <div id="register_div" class="col-md-6 px-5 registration-section">
                    <h4 class="mb-3 section-title"><?= label('register', 'REGISTER') ?></h4>
                    <form id='' class=' cmxform' action='#'>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('mobile_number', 'Mobile Number') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="text" class='form-input form-control phone-number-input' name="mobileNumber"
                                pattern="\d*" placeholder="" id="phone-number" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id='send-otp-button'
                                class="btn submit-btn send_otp_button"><?= label('send_otp', 'Send OTP') ?></button>
                        </div>
                    </form>
                </div>
                <div id="form_otp" class="col-md-6 px-5 registration-section">
                    <h4 class="mb-3 section-title text-center"><?= label('verify', 'VERIFY') ?></h4>
                    <p class="form-lable text-center mb-2">Lorem ipsum dolor..</p>
                    <form id='' class='cmxform' action='#'>
                        <input type="text" class="form-control" id="otpInput" name="otp" maxlength="6" required>
                        <!-- <div class="row" style="width: 70%; margin-left: auto; margin-right: auto;">
                            <div class="col-2">
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text">
                            </div>
                        </div> -->
                        <div class="mt-3 mb-3">
                            <button type="submit" id='send-otp-button'
                                class="btn Register-btn submit-btn send_otp_button"><?= label('verify', 'VERIFY') ?></button>
                        </div>
                    </form>
                </div>
                <!-- Login section-->
                <div class="col-md-6 px-5 login-section" style="display:<?php echo $registrationSectionDisplay; ?>;">
                    <h4 class="mb-3 section-title"><?= label('login', 'LOGIN') ?></h4>
                    <form action="<?= base_url('home/login') ?>" class='form-submit-event' id="login_form"
                        method="post">
                        <div class="mb-3">
                            <label for="Username" class="form-label">
                                <p class="form-lable"> <?= label('mobile_number', 'Mobile Number') ?> <sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="number" class="form-control" name="identity" pattern="\d*" maxlength="16"
                                placeholder="Mobile number"
                                <?= (ALLOW_MODIFICATION == 0) ? 'value="9876543210"' : ""; ?> required>
                        </div>
                        <div class="mb-3">
                            <a href="<?= base_url('#') ?>">
                                <button type="submit"
                                    class="submit_btn btn Register-btn submit-btn"><?= label('login', 'Login') ?></button>
                            </a>
                        </div>
                        <div class="d-flex justify-content-between forget-password">
                            <a id="forgot_password_link">
                                <p class="m-0 pointer"><?= label('forgot_password', 'Forget Password') ?>?</p>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="d-md-none d-flex align-items-center my-4 wd-login-divider">
                    <p></p>
                    <span>OR</span>
                    <p></p>
                </div>
                <div class="col-md-6 px-5 text-center Register-text">
                    <div class="login-text">
                        <h4 class="mb-3 section-title">LOGIN</h4>
                        <p class="mb-3">To access your account and enjoy a seamless shopping experience, simply enter
                            your registered Mobile Number and password in the designated fields. Once logged in, you'll
                            have access to your personalized dashboard, order history, saved payment methods, and more.
                        </p>
                        <button type="button" class="btn login-register-btn login-btn fw-bold">Login</button>
                    </div>
                    <div class="register-text" style="display:<?php echo $registrationSectionDisplay; ?>;">
                        <h4 class="mb-3 section-title">REGISTER</h4>
                        <p class="mb-3">Registering for this site allows you to access your order status and
                            history. Just fill in the fields below, and we'll get a new account set up for you in no
                            time.
                            We will only ask you for information necessary to make the purchase process faster and
                            easier.
                        </p>
                        <button type="button" class="btn login-register-btn register-btn fw-bold">Register</button>
                    </div>
                </div>
            </div>
        </section>
    </main>