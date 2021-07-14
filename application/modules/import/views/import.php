<section id="main-content">
    <section class="wrapper site-min-height">
        <section class="col-md-6">
            <header class="panel-heading">
                <?php echo lang('bulk'); ?> <?php echo lang('patient'); ?> <?php echo lang('import'); ?> (xl, xlsx, csv)

            </header>
            <div class="panel-body">
                <div class="col-md-12">
                    <blockquote>
                        <a href="files/downloads/patient_xl_format.xlsx"><?php echo lang('download'); ?></a> <?php echo lang('the_format_of_xl_file'); ?>.
                        <br> <?php echo lang('please_follow_the_exact_format'); ?>. 
                    </blockquote>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" action="<?php echo site_url('import/importPatientInfo') ?>" class="clearfix" method="post" enctype="multipart/form-data"> 
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1"> <?php echo lang('choose_file'); ?></label>
                                    <input type="file" class="form-control" placeholder="" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    <input type="hidden" name="tablename"value="patient">
                                </div>

                                <section class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php
                $message = $this->session->flashdata('message');
                if (!empty($message)) {
                    ?>
                    <code class="pull-right"> <?php echo $message; ?></code>
                <?php } ?> 
            </div>
        </section>
        <section class="col-md-6">
            <header class="panel-heading">
                <?php echo lang('bulk'); ?> <?php echo lang('doctor'); ?> <?php echo lang('import'); ?> (xl, xlsx, csv)

            </header>
            <div class="panel-body">
                <div class="col-md-12">
                    <blockquote>
                        <a href="files/downloads/doctor_xl_format.xlsx"><?php echo lang('download'); ?></a> <?php echo lang('the_format_of_xl_file'); ?>.
                        <br> <?php echo lang('please_follow_the_exact_format'); ?>. 
                    </blockquote>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" action="<?php echo site_url('import/importDoctorInfo') ?>" class="clearfix" method="post" enctype="multipart/form-data"> 
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1"> <?php echo lang('choose_file'); ?></label>
                                    <input type="file" class="form-control" placeholder="" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    <input type="hidden" name="tablename"value="doctor">
                                </div>

                                <section class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <?php
                $message1 = $this->session->flashdata('message1');
                if (!empty($message1)) {
                    ?>
                    <code class="flash_message pull-right"> <?php echo $message1; ?></code>
                <?php } ?> 
            </div>
        </section>
        <section class="col-md-6">
            <header class="panel-heading">
                <?php echo lang('bulk'); ?> <?php echo lang('medicine'); ?> <?php echo lang('import'); ?> (xl, xlsx, csv)

            </header>
            <div class="panel-body">
                <div class="col-md-12">
                    <blockquote>
                        <a href="files/downloads/medicine_xl_format.xlsx"><?php echo lang('download'); ?></a> <?php echo lang('the_format_of_xl_file'); ?>.
                        <br> <?php echo lang('please_follow_the_exact_format'); ?>. 
                    </blockquote>
                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" action="<?php echo site_url('import/importMedicineInfo') ?>" class="clearfix" method="post" enctype="multipart/form-data"> 
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1"> <?php echo lang('choose_file'); ?></label>
                                    <input type="file" class="form-control" placeholder="" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                    <input type="hidden" name="tablename"value="medicine">
                                </div>

                                <section class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <?php
                $message2 = $this->session->flashdata('message2');
                if (!empty($message2)) {
                    ?>
                    <code class="flash_message pull-right"> <?php echo $message2; ?></code>
                <?php } ?> 
            </div>
        </section>
    </section>
</section>


<style>


    .flash_message{
        padding: 3px;
        text-align: center;
        margin-left: 0px;
        margin-top: 0px;
    }

</style>


<!-- #######################################################################-->





