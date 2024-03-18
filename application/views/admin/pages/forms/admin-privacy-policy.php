<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h4>Admin Privacy Policy And Terms & Conditions</h4>
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Privacy Policy And Terms & Conditions</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <!-- form start -->
                        <form class="form-horizontal form-submit-event" action="<?= base_url('admin/admin_privacy_policy/update-privacy-policy-settings'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body pad">
                                <label for="other_images"> Privacy Policy </label>
                                <a href="<?= base_url('admin/admin-privacy-policy/privacy-policy-page') ?>" target='_blank' class="btn btn-primary btn-xs" title='View Privacy Policy'><i class='fa fa-eye'></i></a>
                                <div class="mb-3">
                                    <textarea name="privacy_policy_input_description" class="textarea addr_editor" placeholder="Place some text here">  <?= output_escaping(str_replace('\r\n', '&#13;&#10;', $privacy_policy)) ?></textarea>
                                </div>
                            </div>
                            <div class="card-body pad">
                                <label for="other_images">Terms & Conditions </label>
                                <a href="<?= base_url('admin/admin-privacy-policy/terms-and-conditions-page') ?>" target='_blank' class="btn btn-primary btn-xs" title='View Terms && Condition'><i class='fa fa-eye'></i></a>
                                <div class="mb-3">
                                    <textarea name="terms_n_conditions_input_description" class="textarea addr_editor" placeholder="Place some text here">  <?= output_escaping(str_replace('\r\n', '&#13;&#10;', $terms_n_condition)) ?></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-success" id="submit_btn">Update Privacy Policy And Terms & Conditions</button>
                                </div>
                            </div>

                            
                            <!-- /.card-body -->
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