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
                    <form id='send-otp-form' class='send-otp-form cmxform' action='#'>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('mobile_number', 'Mobile Number') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="text" class='form-input form-control phone-number-input' name="mobileNumber"
                                pattern="\d*" placeholder="Enter Mobile Number" id="phone-number" required>
                        </div>
                        <div id="recaptcha-container"></div>
                        <div id='is-user-exist-error' class='text-center text-danger'></div>
                        <div id='recaptcha-error' class='text-center text-danger'></div>
                        <div class="mb-3">
                            <button type="submit" id='send-otp-button'
                                class="btn Register-btn submit-btn send_otp_button"><?= label('send_otp', 'Send OTP') ?></button>
                        </div>
                    </form>
                    <form id='verify-otp-form' class='verify-otp-form' action='<?= base_url('auth/register-user') ?>'
                        method="POST" <?php echo $verifyOtpForm; ?>>
                        <div class="col-12 d-flex justify-content-center pb-4">
                            <input type="hidden" class='form-input' id="type" name="type" value="phone">
                        </div>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('otp', 'Otp') ?><sup class="text-danger fw-bold">*</sup>
                                </p>
                            </label>
                            <input type="number" class='form-input form-control' placeholder="OTP" id="otp" name="otp"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('username', 'Username') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="text" class='form-input form-control' placeholder="Username" id="name"
                                name="name" required>
                        </div>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('email', 'Email') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="email" class='form-input form-control' placeholder="Email" id="email"
                                name="email" required>
                        </div>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('password', 'Password') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <span class="password-insert form-control d-flex p-0 align-items-center">
                                <input type="password" class="form-input form-control" id="password" name="password"
                                    placeholder="Password" required>
                                <span class="eye-icons mx-0">
                                    <ion-icon name="eye-outline" class="eye-btn password-show">
                                    </ion-icon>
                                    <ion-icon name="eye-off-outline" class="eye-btn password-hide">
                                    </ion-icon>
                                </span>
                            </span>
                        </div>
                        <?php $referal_code = substr(str_shuffle(str_repeat("AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz1234567890", 8)), 0, 8);
                        ?> <input type="hidden" class='form-input' name="referral_code" value=<?= $referal_code; ?>>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('referral_code', 'referral code') ?></p>
                            </label>
                            <input type="text" class='form-input form-control' placeholder="referral code"
                                id="friends_code" name="friends_code">
                        </div>
                        <div id='registration-error' class='text-center text-danger'></div>
                        <button type="submit" id='register_submit_btn'
                            class="btn btn-primary Register-btn register_submit_btn"><?= label('submit', 'Submit') ?></button>
                    </form>
                    <form id='sign-up-form' class='sign-up-form' action='#' <?php echo $signUpForm; ?>>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('username', 'Username') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="text" placeholder="Username" name='username' class='form-input form-control'
                                required>
                        </div>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('email', 'Email') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="text" placeholder="email" name='email' class='form-input form-control'
                                required>
                        </div>
                        <div class="mb-3 sign-up-verify-number">
                            <label for="exampleFormUsername" class="form-label">
                                <p class="form-lable"><?= label('password', 'Password') ?><sup
                                        class="text-danger fw-bold">*</sup></p>
                            </label>
                            <input type="password" placeholder="Password" name='password'
                                class='form-input form-control' required>
                        </div>
                        <div id='sign-up-error' class='text-center p-3'></div>
                        <button type="submit"
                            class="btn btn-primary Register-btn"><?= label('register', 'Register') ?></button>
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
                        <!-- <div class="mb-3">
                            <label for="setpassword" class="form-label">
                                <p class="form-lable"><?= label('password', 'Password') ?> <sup class="text-danger fw-bold">*</sup></p>
                            </label>
                            <span class="password-insert form-control d-flex p-0 align-items-center">
                                <input type="password" class="form-control" id="fill-password" name="password" placeholder="Password" value="" required>
                                <span class="eye-icons mx-0">
                                    <ion-icon name="eye-outline" class="eye-btn password-show">
                                    </ion-icon>
                                    <ion-icon name="eye-off-outline" class="eye-btn password-hide">
                                    </ion-icon>
                                </span>
                            </span>
                        </div> -->
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