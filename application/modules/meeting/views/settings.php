<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('zoom'); ?> <?php echo lang('live_meeting_settings'); ?>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="meeting/settings" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-md-3 payment_label">
                                        <label for="exampleInputEmail1"> <?php echo lang('api_key'); ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="api_key" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->api_key)) {
                                            echo $settings->api_key;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-3 payment_label">
                                        <label for="exampleInputEmail1"> <?php echo lang('api_secret'); ?> </label>
                                    </div>
                                    <div class="col-md-7 payment_label">
                                        <input type="text" class="form-control" name="api_secret" id="exampleInputEmail1" value='<?php
                                        if (!empty($settings->secret_key)) {
                                            echo $settings->secret_key;
                                        }
                                        ?>' placeholder="">
                                    </div>
                                </div>




                                 
                                <input type="hidden" name="id" value='<?php
                                if (!empty($settings->id)) {
                                    echo $settings->id;
                                }
                                ?>'>
                                 <div class="col-md-12 payment_label">
                                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>