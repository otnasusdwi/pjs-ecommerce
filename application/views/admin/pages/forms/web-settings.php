<div class="content-wrapper">
    <section class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h4>General Website Settings</h4>
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">General Website Settings</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <form class="form-horizontal form-submit-event" action="<?= base_url('admin/setting/update_web_settings') ?>" method="POST" id="system_setting_form" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="site_title">Site Title <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="site_title" value="<?= (isset($web_settings['site_title'])) ? output_escaping($web_settings['site_title']) : '' ?>" placeholder="Prefix title for the website. " />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="support_number">Support Number <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="support_number" value="<?= (isset($web_settings['support_number'])) ? output_escaping($web_settings['support_number']) : '' ?>" placeholder="Customer support mobile number" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="support_email">Support Email <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="support_email" value="<?= (isset($web_settings['support_email'])) ? output_escaping($web_settings['support_email']) : '' ?>" placeholder="Customer support email" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="address">Copyright Details <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="copyright_details" id="copyright_details" class="form-control mb-2" cols="30" rows="3"><?= (isset($web_settings['copyright_details'])) ? output_escaping($web_settings['copyright_details']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="address">Address <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="address" id="address" class="form-control mb-2" cols="30" rows="5"><?= (isset($web_settings['address'])) ? output_escaping($web_settings['address']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="app_short_description">Short Description <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="app_short_description" id="app_short_description" class="form-control mb-2" cols="30" rows="5"><?= (isset($web_settings['app_short_description'])) ? output_escaping($web_settings['app_short_description']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="map_iframe">Map Iframe <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="map_iframe" id="map_iframe" class="form-control mb-2" cols="30" rows="5"><?= (isset($web_settings['map_iframe'])) ? output_escaping($web_settings['map_iframe']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="mb-2" for="logo">Logo <span class='text-danger text-xs'>*</span><small>(Recommended Size : larger than 120 x 120 & smaller than 150 x 150 pixels.)</small></label>
                                                <div class="col-sm-10">
                                                    <div class='col-md-3'><a class="uploadFile img btn btn-primary text-white btn-sm" data-input='logo' data-isremovable='0' data-is-multiple-uploads-allowed='0' data-toggle="modal" data-target="#media-upload-modal" value="Upload Photo"><i class='fa fa-upload'></i> Upload</a></div>
                                                    <?php
                                                    if (!empty($logo)) {
                                                    ?>
                                                        <label class="mb-2" class="text-danger mt-3">*Only Choose When Update is necessary</label>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image">
                                                                <div class=''>
                                                                    <div class='upload-media-div'><img class="img-fluid mb-2" src="<?= BASE_URL() . $logo ?>" alt="Image Not Found"></div>
                                                                    <input type="hidden" name="logo" id='logo' value='<?= $logo ?>'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else { ?>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image d-none">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="mb-2" for="favicon">Favicon <span class='text-danger text-xs'>*</span></label>
                                                <div class="col-sm-10">
                                                    <div class='col-md-3'><a class="uploadFile img btn btn-primary text-white btn-sm" data-input='favicon' data-isremovable='0' data-is-multiple-uploads-allowed='0' data-toggle="modal" data-target="#media-upload-modal" value="Upload Photo"><i class='fa fa-upload'></i> Upload</a></div>
                                                    <?php
                                                    if (!empty($favicon)) {
                                                    ?>
                                                        <label class="mb-2" class="text-danger mt-3">*Only Choose When Update is necessary</label>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image">
                                                                <img class="img-fluid mb-2" src="<?= BASE_URL() . $favicon ?>" alt="Image Not Found">
                                                                <input type="hidden" name="favicon" id='favicon' value='<?= $favicon ?>'>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else { ?>
                                                        <div class="container-fluid row image-upload-section">
                                                            <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded text-center grow image d-none">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="support_email">Meta Keywords <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="meta_keywords" id="meta_keywords" class="form-control mb-2" cols="30" rows="5"><?= (isset($web_settings['meta_keywords'])) ? $web_settings['meta_keywords'] : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="support_email">Meta Description <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="meta_description" id="meta_description" class="form-control mb-2" cols="30" rows="5"><?= (isset($web_settings['meta_description'])) ? $web_settings['meta_description'] : '' ?></textarea>
                                    </div>
                                </div>
                                <hr>
                                <h4>Developer Mode</h4>
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label class="mb-2" for="is_delivery_boy_otp_setting_on"> Enable / Disable <small>(Keep it OFF in Production, only turn it on when you require eShop Support.) </small> </label>
                                        <div class="card-body">
                                            <input type="checkbox" name="developer_mode" <?= (isset($web_settings['developer_mode']) && $web_settings['developer_mode'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4>App download Section</h4>
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label class="mb-2" for="is_delivery_boy_otp_setting_on"> Enable / Disable</label>
                                        <div class="card-body">
                                            <input type="checkbox" name="app_download_section" <?= (isset($web_settings['app_download_section']) && $web_settings['app_download_section'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="app_download_section_title">Title <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="app_download_section_title" value="<?= (isset($web_settings['app_download_section_title'])) ? output_escaping($web_settings['app_download_section_title']) : '' ?>" placeholder="App download section title. " />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="app_download_section_tagline">Tagline<span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="app_download_section_tagline" value="<?= (isset($web_settings['app_download_section_tagline'])) ? output_escaping($web_settings['app_download_section_tagline']) : '' ?>" placeholder="App download section Tagline." />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="mb-2" for="app_download_section_short_description">Short Description <span class='text-danger text-xs'>*</span></label>
                                        <textarea name="app_download_section_short_description" id="app_download_section_short_description" class="form-control" cols="30" rows="5"><?= (isset($web_settings['app_download_section_short_description'])) ? output_escaping($web_settings['app_download_section_short_description']) : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="promo_head_description">Promo Header Description<span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="promo_head_description" value="<?= (isset($web_settings['promo_head_description'])) ? output_escaping($web_settings['promo_head_description']) : '' ?>" placeholder="Promo Header Description." />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="app_download_section_title">Playstore URL <span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="app_download_section_playstore_url" value="<?= (isset($web_settings['app_download_section_playstore_url'])) ? output_escaping($web_settings['app_download_section_playstore_url']) : '' ?>" placeholder="Playstore URL. " />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="app_download_section_tagline">Applestore URL<span class='text-danger text-xs'>*</span></label>
                                        <input type="text" class="form-control mb-2" name="app_download_section_appstore_url" value="<?= (isset($web_settings['app_download_section_appstore_url'])) ? output_escaping($web_settings['app_download_section_appstore_url']) : '' ?>" placeholder="Appstore URL." />
                                    </div>
                                </div>
                                <hr>
                                <h4>Social Media Links</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="twitter_link">Twitter</label>
                                        <input type="text" class="form-control mb-2" name="twitter_link" value="<?= (isset($web_settings['twitter_link'])) ? output_escaping($web_settings['twitter_link']) : '' ?>" placeholder="Twitter Link" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="facebook_link">Facebook</label>
                                        <input type="text" class="form-control mb-2" name="facebook_link" value="<?= (isset($web_settings['facebook_link'])) ? output_escaping($web_settings['facebook_link']) : '' ?>" placeholder="Facebook Link" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="instagram_link">Instagram</label>
                                        <input type="text" class="form-control mb-2" name="instagram_link" value="<?= (isset($web_settings['instagram_link'])) ? output_escaping($web_settings['instagram_link']) : '' ?>" placeholder="Instagram Link" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="youtube_link">Youtube</label>
                                        <input type="text" class="form-control mb-2" name="youtube_link" value="<?= (isset($web_settings['youtube_link'])) ? output_escaping($web_settings['youtube_link']) : '' ?>" placeholder="Youtube Link" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="whatsapp_link">Whatsapp</label>
                                        <input type="text" class="form-control mb-2" name="whatsapp_link" value="<?= (isset($web_settings['whatsapp_link'])) ? output_escaping($web_settings['whatsapp_link']) : '' ?>" placeholder="Whatsapp Link" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="linkedin_link">Linkedin</label>
                                        <input type="text" class="form-control mb-2" name="linkedin_link" value="<?= (isset($web_settings['linkedin_link'])) ? output_escaping($web_settings['linkedin_link']) : '' ?>" placeholder="Linkedin Link" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="tiktok_link">Tiktok</label>
                                        <input type="text" class="form-control mb-2" name="tiktok_link" value="<?= (isset($web_settings['tiktok_link'])) ? output_escaping($web_settings['tiktok_link']) : '' ?>" placeholder="Tiktok Link" />
                                    </div>
                                </div>
                                <hr>
                                <h4>Feature Section</h4>
                                <div class="row">
                                    <h4 class="h4 col-md-12">Shipping</h4>
                                    <div class="form-group col-md-2 col-sm-4">
                                        <label class="mb-2" for="shipping_mode"> Enable / Disable</label>
                                        <div class="card-body">
                                            <input type="checkbox" name="shipping_mode" <?= (isset($web_settings['shipping_mode']) && $web_settings['shipping_mode'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="shipping_title">Title</label>
                                        <input type="text" class="form-control mb-2" name="shipping_title" value="<?= (isset($web_settings['shipping_title'])) ? output_escaping($web_settings['shipping_title']) : '' ?>" placeholder="Shipping Title" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="shipping_description">Description</label>
                                        <textarea name="shipping_description" class="form-control mb-2" id="shipping_description" cols="30" rows="4" placeholder="Shipping Description"><?= (isset($web_settings['shipping_description'])) ? output_escaping($web_settings['shipping_description']) : '' ?></textarea>
                                    </div>

                                    <h4 class="h4 col-md-12">Returns</h4>
                                    <div class="form-group col-md-2 col-sm-4">
                                        <label class="mb-2" for="return_mode"> Enable / Disable</label>
                                        <div class="card-body">
                                            <input type="checkbox" name="return_mode" <?= (isset($web_settings['return_mode']) && $web_settings['return_mode'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="return_title">Title</label>
                                        <input type="text" class="form-control mb-2" name="return_title" value="<?= (isset($web_settings['return_title'])) ? output_escaping($web_settings['return_title']) : '' ?>" placeholder="Return Title" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="return_description">Description</label>
                                        <textarea name="return_description" class="form-control mb-2" id="return_description" cols="30" rows="4" placeholder="Return Description"><?= (isset($web_settings['return_description'])) ? output_escaping($web_settings['return_description']) : '' ?></textarea>
                                    </div>

                                    <h4 class="h4 col-md-12">Support</h4>
                                    <div class="form-group col-md-2 col-sm-4">
                                        <label class="mb-2" for="support_mode"> Enable / Disable</label>
                                        <div class="card-body">
                                            <input type="checkbox" name="support_mode" <?= (isset($web_settings['support_mode']) && $web_settings['support_mode'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="support_title">Title</label>
                                        <input type="text" class="form-control mb-2" name="support_title" value="<?= (isset($web_settings['support_title'])) ? output_escaping($web_settings['support_title']) : '' ?>" placeholder="Support Title" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="shipping_description">Description</label>
                                        <textarea name="support_description" class="form-control mb-2" id="support_description" cols="30" rows="4" placeholder="Support Description"><?= (isset($web_settings['support_description'])) ? output_escaping($web_settings['support_description']) : '' ?></textarea>
                                    </div>

                                    <h4 class="h4 col-md-12">Safety & Security</h4>
                                    <div class="form-group col-md-2 col-sm-4">
                                        <label class="mb-2" for="safety_security_mode"> Enable / Disable</label>
                                        <div class="card-body">
                                            <input type="checkbox" name="safety_security_mode" <?= (isset($web_settings['safety_security_mode']) && $web_settings['safety_security_mode'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="safety_security_title">Title</label>
                                        <input type="text" class="form-control mb-2" name="safety_security_title" value="<?= (isset($web_settings['safety_security_title'])) ? output_escaping($web_settings['safety_security_title']) : '' ?>" placeholder="Safety & Security Title" />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2" for="safety_security_description">Description</label>
                                        <textarea name="safety_security_description" class="form-control mb-2" id="safety_security_description" cols="30" rows="4" placeholder="Safety & Security Description"><?= (isset($web_settings['safety_security_description'])) ? output_escaping($web_settings['safety_security_description']) : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-7 pl-0">
                                    <h4>Theme Modern Settings</h4>
                                    <label for="modern_theme_color">Theme color</label>
                                    <select id="modern_theme_color" name="modern_theme_color" class="form-control col-md-5">
                                        <option value="default" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'default') ? 'selected' : "" ?>>default</option>
                                        <option value="blue" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'blue') ? 'selected' : "" ?>>blue</option>
                                        <option value="cyan-dark" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'cyan-dark') ? 'selected' : "" ?>>Cyan dark</option>
                                        <option value="dark-blue" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'dark-blue') ? 'selected' : "" ?>>Dark blue</option>
                                        <option value="dark-purple" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'dark-purple') ? 'selected' : "" ?>>Dark purple</option>
                                        <option value="green" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'green') ? 'selected' : "" ?>>Green</option>
                                        <option value="indigo" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'indigo') ? 'selected' : "" ?>>Indigo</option>
                                        <option value="orange" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'orange') ? 'selected' : "" ?>>Orange</option>
                                        <option value="peach" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'peach') ? 'selected' : "" ?>>Peach</option>
                                        <option value="pink" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'pink') ? 'selected' : "" ?>>Pink</option>
                                        <option value="purple" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'purple') ? 'selected' : "" ?>>Purple</option>
                                        <option value="red" <?= (isset($web_settings['modern_theme_color']) && $web_settings['modern_theme_color'] == 'red') ? 'selected' : "" ?>>Red</option>
                                    </select>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="reset" class="btn btn-warning" id="web-form-rest">Reset</button>
                                    <button type="submit" class="btn btn-success" id="submit_btn">Update Settings</button>
                                </div>
                                

                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>