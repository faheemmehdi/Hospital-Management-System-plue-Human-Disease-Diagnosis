<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-8">
            <section class="panel">
                <header class="panel-heading">
                    <?php if (empty($id)) { ?>
                        <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');
                } else { ?>
                        <i class="fa fa-edit"></i> <?php echo lang('edit'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');
                } ?>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <div class="panel-body">
<?php echo validation_errors(); ?>
                                        <form role="form" name="myform" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    

                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                if (!empty($templatename->name)) {
                                                    echo $templatename->name;
                                                }
                                                if (!empty($setval)) {
                                                    echo set_value('name');
                                                }
                                                ?>' placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                                                <?php
                                                $count = 0;
                                                foreach ($shortcode as $shortcodes) {
                                                    ?>
                                                    <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext(this);">
                                                    <?php
                                                    $count+=1;
                                                    if ($count === 7) {
                                                        ?>
                                                        <br>
                                                        <?php
                                                    }
                                                }
                                                ?> <br><br>
                                                <textarea class="" id="editor1" name="message" value='<?php
                                                if (!empty($templatename->message)) {
                                                    echo $templatename->message;
                                                }
                                                if (!empty($setval)) {
                                                    echo set_value('message');
                                                }
                                                ?>' cols="70" rows="10"placeholder="" required> <?php
                                                              if (!empty($templatename->message)) {
                                                                  echo $templatename->message;
                                                              }
                                                              if (!empty($setval)) {
                                                                  echo set_value('message');
                                                              }
                                                              ?></textarea>
                                            </div>
                                            <input type="hidden" name="id" value='<?php
                                            if (!empty($templatename->id)) {
                                                echo $templatename->id;
                                            }
                                            ?>'>
                                            <input type="hidden" name="type" value='sms'>
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </form>
                                    </div>
                                </section>
                            </div>
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
<script>
    function addtext(ele) {
        var fired_button = ele.value;
        document.myform.message.value += fired_button;
    }
</script>
