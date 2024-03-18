<div class="content-wrapper card">

    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content-header mt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h4>Payment Methods Settings</h4>
                </div>
                <div class="col-sm-4 d-flex justify-content-end">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/home') ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Payment Methods Settings</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <div class="container-fluid ">
            <div class="row ">

                <div class="col-md-2">
                    <div class="card card-info">
                        <form class="form-horizontal form-submit-event"
                            action="<?= base_url('admin/Payment_settings/update_payment_settings'); ?>" method="POST"
                            id="payment_setting_form">
                            <ul class="nav flex-column nav-pills  menu payment-sidebar">
                                <li class="nav-item ">
                                    <a class="nav-link active" data-toggle="tab" href="#xendit">Xendit</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link " data-toggle="tab" href="#cash_on_delivery">Cash On Delivery</a>
                                </li>
                            </ul>
                            <!--/.card-->
                    </div>
                    <!--/.col-md-12-->
                </div>


                <div class="tab-content col-md-10 ">
                    <div id="xendit" class="tab-pane active">
                        <div>
                            <div class="d-flex justify-content-between">
                                <h5>Xendit Payments </h5>

                                <div class="form-group col-md-8 mb-2 mb-2 mb-2 mb-2 d-flex justify-content-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="xendit_payment_method" name="xendit_payment_method" <?= (@$settings['xendit_payment_method']) == '1' ? 'Checked' : '' ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <b>
                                        <label for="xendit_secret_key_test">Xendit Secret Key (Test) </label>
                                    </b>
                                </div>
                                <div class="form-group col-md-12 mb-2 mb-2 mb-2 mb-2 mt-2">
                                    <input type="text" class="form-control" name="xendit_secret_key_test"
                                        value="<?= @$settings['xendit_secret_key_test'] ?>"
                                        placeholder="Xendit Secret Key (Test)" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <b>
                                        <label for="xendit_secret_key_live">Xendit Secret Key (Live) </label>
                                    </b>
                                </div>
                                <div class="form-group col-md-12 mb-2 mb-2 mb-2 mb-2 mt-2">
                                    <input type="text" class="form-control" name="xendit_secret_key_live"
                                        value="<?= @$settings['xendit_secret_key_live'] ?>"
                                        placeholder="Xendit Secret Key (Live)" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="cash_on_delivery" class="tab-pane">
                        <div>
                            <div class="d-flex justify-content-between">
                                <h5>Cash On Delivery </h5>
                                <div class="form-group col-md-8 mb-2 mb-2 mb-2 mb-2 
                                       justify-content-end">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="cod_method" name="cod_method" <?= (@$settings['cod_method']) == '1' ? 'Checked' : '' ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mt-2">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary" id="submit_btn">Update Payment Settings</button>
                    </div>
                </div>
                </form>
                <!-- /.row -->
            </div>

    </section>
    <!-- /.container-fluid -->
    <!-- /.content -->

</div>