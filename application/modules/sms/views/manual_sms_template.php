
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('smstemplate'); ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="add_new" class="btn green btn-md">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?> <?php echo lang('template'); ?>
                            </button>
                        </div>
                    </a>
                </div> 

            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo lang('templatename'); ?></th>                        
                                <th><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<!--  add Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <form role="form" name="myform1" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                            <?php
                            $count+=1;
                            if ($count === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>
                        <textarea class="" id="editor5" name="message" value='' cols="70" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="type" value='sms'>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Area Modal-->

<!-- Edit sms temp Modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');?></h4>
            </div>
            <div class="modal-body">
               <?php echo validation_errors(); ?>
                <form role="form" id="smstemp" name="myform" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count1 = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext(this);">
                            <?php
                            $count1+=1;
                            if ($count1 === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>
                         <textarea class="" name="message" id="editor4" value="" cols="70" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="type" value='sms'>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function () {
        CKEDITOR.config.autoParagraph = false;
    });
</script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                         $(".table").on("click", ".editbutton1", function () {
                                           // e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            var type = 'sms';
                                           
                                            $.ajax({
                                                url: 'sms/editManualSMSTemplate?id=' + iid + '&type=' + type,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                // Populate the form fields with the data returned from server
                                                $('#smstemp').find('[name="id"]').val(response.templatename.id).end() ;
                                                $('#smstemp').find('[name="name"]').val(response.templatename.name).end() ;
                                                 $('#smstemp').find('[name="message"]').val(response.templatename.message).end() ;
                                               // CKEDITOR.instances['editor4'].setData(response.templatename.message)
                                             //   $('#smstemp').find('[name="message"]').val(response.templatename.message).end();
                                                $('#myModal1').modal('show');
                                            });
                                        });
                                    });
</script>
<script>


    $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "sms/getManualSMSTemplateList",
                type: 'POST',
                'data': {'type': 'sms'}
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
            ],
            aLengthMenu: [
                [1, 2, 50, 100, -1],
                [1, 2, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
        });
        table.buttons().container()
                .appendTo('.custom_buttons');
    });
</script>
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
<script>
    function addtext1(ele) {
        var fired_button = ele.value;
        document.myform1.message.value += fired_button;
    }
</script>