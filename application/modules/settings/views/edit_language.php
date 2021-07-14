<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-12 row">
            <section class="col-md-10 row">
                <header class="panel-heading">
                    <?php echo lang('language'); ?> <?php echo lang('translation'); ?>
                </header>
                <div class="panel-body">
                    <div class="adv-table editable-table ">
                        <div class="clearfix">
                            <?php echo validation_errors(); ?>
                            <form role="form" action="settings/addLanguageTranslation" class="clearfix" method="post" enctype="multipart/form-data" id="myForm">
                                <input type="hidden" name="language" value="<?php echo $languagename; ?>">
                                 <input type="hidden" name="valueupdate" value="">
                                  <input type="hidden" name="indexupdate" value="">
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('name'); ?></th>
                                            <th><?php echo lang('translation'); ?></th>
                                        </tr>
                                    </thead><tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($languages as $key => $value) {
                                            $i = $i + 1;
                                            ?>
                                            <tr class="table-bordered">
                                                <td><?php echo $i; ?></td>
                                                <td class="table-bordered">  
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="index[]" id="index" value='<?php
                                                        echo $key;
                                                        ?>' placeholder="" readonly> </div>
                                                </td>
                                                <td class="table-bordered">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="value[]" id="value" value="<?php
                                                        echo $value;
                                                        ?>" placeholder="">  
                                                    </div> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> <button id="submit" type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>




                                    </tfoot>
                                    <style>
                                        .table-bordered {
                                            border: 1px solid #ddd !important;
                                        }
                                    </style>
                                </table>
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
<script>
    $(document).ready(function () {
        $("#submit").click(function () {
            var indexes = $("input[name='index[]']")
                    .map(function () {
                        return $(this).val();
                    }).get();
            var values = $("input[name='value[]']")
                    .map(function () {
                        return $(this).val();
                    }).get();
            $("input[name='value[]']").attr("disabled");
            $("input[name='index[]']").attr("disabled");
            var indexupdate="";
            var valueupdate=""
            $.each(indexes, function (index, value) {
                indexupdate=indexupdate+"#**##***"+value;
            });
            $.each(values, function (index, value) {
                valueupdate = valueupdate+"*##**###"+value;
            });
            $('#myForm').find('[name="valueupdate"]').val(valueupdate).end()
             $('#myForm').find('[name="indexupdate"]').val(indexupdate).end()
              $('#myForm').submit();
            // var index=$("#index").val();
            //  var value=$("#value").val();
          //  console.log(index);
            //block of code that runs when the click event triggers
        });
    });
</script>