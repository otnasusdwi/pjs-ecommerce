<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8 mt-2">
                    <h4>Add Promo Code</h4>
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Promo Code</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <!-- form start -->
                        <form class="form-horizontal form-submit-event" action="<?= base_url('admin/promo_code/add_promo_code'); ?>" method="POST">

                            <div class="card-body">
                                <?php
                                if (isset($fetched_details[0]['id']) && !empty($fetched_details[0]['id'])) {
                                ?>
                                    <input type="hidden" name="edit_promo_code" value="<?= $fetched_details[0]['id'] ?>">
                                <?php
                                }
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="">Promo Code <span class='text-danger text-sm'>*</span></label>
                                        <input type="text" class="form-control" name="promo_code" value="<?= @$fetched_details[0]['promo_code'] ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2" for="">Message <span class='text-danger text-sm'>*</span></label>
                                        <input type="text" class="form-control" name="message" value="<?= @$fetched_details[0]['message'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Start Date <span class='text-danger text-sm'>*</span></label>
                                        <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="<?= @$fetched_details[0]['start_date'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">End Date <span class='text-danger text-sm'>*</span></label>
                                        <input type="datetime-local" class="form-control" name="end_date" id="end_date"  min="<?= date('Y-m-d\TH:i') ?>" value="<?= @$fetched_details[0]['end_date'] ?>">
                                    </div>

                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="is_specific_user"> For specific users? </label>
                                        <div class="card-body">
                                            <input type="checkbox" id="is_specific_user" class="switch" name="is_specific_user" <?= (isset($fetched_details[0]['is_specific_users']) && $fetched_details[0]['is_specific_users'] == '1')
                                                                                                                                    ?
                                                                                                                                    'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="col-md-6 promocode_users <?= (isset($fetched_details[0]['is_specific_users']) && $fetched_details[0]['is_specific_users'] == 1) ? '' : 'collapse' ?>" id="promocode_users">
                                        <label for="user_id" class="control-label mt-2"> Users</label>
                                        <select class="select_promocode_user w-100 form-control" name="users_id[]" multiple id="select_user_id" onload="multiselect()">
                                            <?php if (isset($fetched_details[0]['users_id'])) {
                                                $user_id = explode(",", $fetched_details[0]['users_id'] ?? '');
                                                foreach ($users_details as $row) {
                                            ?>
                                                    <option value="<?= $row['id'] ?>" selected><?= $row['username'] . " | " . $row['mobile'] . " | " . $row['email'] ?></option>

                                            <?php
                                                }
                                            } ?>

                                        </select>
                                    </div>


                                    <div class="form-group col-md-6 no_of_users mt-2">
                                        <label class="mb-2" for="">No. Of Users <span class='text-danger text-sm'>*</span></label>
                                        <input type="number" min="0" class="form-control " name="no_of_users" value="<?= @$fetched_details[0]['no_of_users'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Minimum Order Amount <span class='text-danger text-sm'>*</span></label>
                                        <input type="number" min="0" class="form-control" name="minimum_order_amount" value="<?= @$fetched_details[0]['minimum_order_amount'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Discount <span class='text-danger text-sm'>*</span></label>
                                        <input type="number" min="0" class="form-control" name="discount" id="discount" value="<?= @$fetched_details[0]['discount'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Discount Type <span class='text-danger text-sm'>*</span></label>
                                        <select name="discount_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="percentage" <?= (isset($fetched_details[0]['discount_type']) && $fetched_details[0]['discount_type'] == 'percentage') ? 'selected' : '' ?>>Percentage</option>
                                            <option value="amount" <?= (isset($fetched_details[0]['discount_type']) && $fetched_details[0]['discount_type'] == 'amount') ? 'selected' : '' ?>>Amount</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Max Discount Amount <span class='text-danger text-sm'>*</span></label>
                                        <input type="number" min="0" class="form-control" name="max_discount_amount" id="max_discount_amount" value="<?= @$fetched_details[0]['max_discount_amount'] ?>">
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Repeat Usage <span class='text-danger text-sm'>*</span></label>
                                        <select name="repeat_usage" id="repeat_usage" class="form-control">
                                            <option value="">Select</option>
                                            <option value="1" <?= (isset($fetched_details[0]['repeat_usage']) && $fetched_details[0]['repeat_usage'] == '1') ? 'selected' : '' ?>>Allowed</option>
                                            <option value="0" <?= (isset($fetched_details[0]['repeat_usage']) && $fetched_details[0]['repeat_usage'] == '0') ? 'selected' : '' ?>>Not Allowed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="image">Main Image <span class='text-danger text-sm'>*</span><small>(Recommended Size : 80 x 80 pixels)</small></label>
                                        <div class="col-sm-10">
                                            <div class='col-md-5'><a class="uploadFile img btn btn-primary text-white btn-sm" data-input='image' data-isremovable='0' data-is-multiple-uploads-allowed='0' data-toggle="modal" data-target="#media-upload-modal" value="Upload Photo"><i class='fa fa-upload'></i> Upload</a></div>
                                            <?php
                                            if (file_exists(FCPATH . @$fetched_details[0]['image']) && !empty(@$fetched_details[0]['image'])) {
                                            ?>
                                                <label class="text-danger mt-3">*Only Choose When Update is necessary</label>
                                                <div class="container-fluid row image-upload-section">
                                                    <div class="col-md-12 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image">
                                                        <div class='image-upload-div'><img class="img-fluid mb-2" src="<?= BASE_URL() . $fetched_details[0]['image'] ?>" alt="Image Not Found"></div>
                                                        <input type="hidden" name="image" value='<?= $fetched_details[0]['image'] ?>'>
                                                    </div>
                                                </div>
                                            <?php
                                            } else { ?>
                                                <div class="container-fluid row image-upload-section">
                                                    <div class="col-md-3 col-sm-12 shadow p-3 mb-5 bg-white rounded m-4 text-center grow image d-none"></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="">Status <span class='text-danger text-sm'>*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select</option>
                                            <option value="1" <?= (isset($fetched_details[0]['status']) && $fetched_details[0]['status'] == '1') ? 'selected' : '' ?>>Active</option>
                                            <option value="0" <?= (isset($fetched_details[0]['status']) && $fetched_details[0]['status'] == '0') ? 'selected' : '' ?>>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="is_cashback"> Is Cashback? </label>
                                        <div class="card-body">
                                            <input type="checkbox" name="is_cashback" <?= (isset($fetched_details[0]['is_cashback']) && $fetched_details[0]['is_cashback'] == '1') ? 'Checked' : ''  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mt-2">
                                        <label class="mb-2" for="is_cashback"> List Promocode? </label>
                                        <div class="card-body">
                                            <input type="checkbox" name="list_promocode" <?= (isset($fetched_details[0]['list_promocode']) && $fetched_details[0]['list_promocode'] == '0') ? '' : 'Checked'  ?> data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mt-2<?= (isset($fetched_details[0]['repeat_usage']) && $fetched_details[0]['repeat_usage'] == '1') ? '' : ' d-none' ?>" id="repeat_usage_html">
                                        <label class="mb-2" for=""> No of repeat usage </label>
                                        <input type="number" min="0" class="form-control" name="no_of_repeat_usage" id="no_of_repeat_usage" value="<?= @$fetched_details[0]['no_of_repeat_usage'] ?>">
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-success" id="submit_btn"><?= (isset($fetched_details[0]['id'])) ? 'Update Promo Code' : 'Add Promo Code' ?></button>
                                </div>
                            </div>
                            
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!--/.card-->
                </div>
                <!--/.col-md-12-->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>