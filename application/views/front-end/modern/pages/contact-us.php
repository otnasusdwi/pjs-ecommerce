<main>
    <section id="content" class="container py-4">
        <h2 class="section-title text-center pb-3"><?= !empty($this->lang->line('contact_us')) ? $this->lang->line('contact_us') : 'Contact Us' ?></h2>
        <div class="main-content">
            <div class="row">
                <div class="col-md-7">
                    <div class="sign-up-image">
                        <?php if (isset($web_settings['map_iframe']) && !empty($web_settings['map_iframe'])) {
                            echo html_entity_decode(stripcslashes($web_settings['map_iframe']));
                        } ?>
                    </div>
                </div>
                <div class="col-md-5 login-form mt-md-0 mt-3">
                    <form id="contact-us-form" action="<?= base_url('home/send-contact-us-email') ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="inputEmail4"><?= !empty($this->lang->line('username')) ? $this->lang->line('username') : 'User Name' ?></label>
                                <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="inputPassword4"><?= !empty($this->lang->line('email')) ? $this->lang->line('email') : 'Email' ?></label>
                                <input type="email" class="form-control" id="inputPassword4" name="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputAddress"><?= !empty($this->lang->line('subject')) ? $this->lang->line('subject') : 'Subject' ?></label>
                            <input type="text" class="form-control" id="inputAddress" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group mb-2">
                            <label for="inputAddress"><?= !empty($this->lang->line('message')) ? $this->lang->line('message') : 'Message' ?></label>
                            <textarea class="form-control" name="message" rows="4" cols="58"></textarea>
                        </div>
                        <button id="contact-us-submit-btn" class="btn btn-primary mt-2"><?= !empty($this->lang->line('send_message')) ? $this->lang->line('send_message') : 'Send Message' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>