      
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('import'); ?>  <?php echo lang('module'); ?> 
            </header>
            <!--
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
            -->


            <!-- Main content -->
            <div class="row">
                <div class="col-md-4">
                </div>
                <!-- left column -->
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Import student data</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="<?php echo site_url('import/importfile') ?>" method="post" enctype="multipart/form-data"> 
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="exampleInputEmail1"> Choose Files</label>
                                    <input type="file" class="form-control" placeholder="" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <span class="glyphicon glyphicon-file form-control-feedback"></span>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>



<!-- #######################################################################-->





