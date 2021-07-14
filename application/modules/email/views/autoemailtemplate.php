
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">

            <header class="panel-heading">
                <?php echo lang('autoemailtemplate'); ?>
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo lang('category'); ?></th>
                                <th><?php echo lang('message'); ?></th> 
                                <th><?php echo lang('status'); ?></th>
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



<!-- Edit sms temp Modal-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('auto'); ?> <?php echo lang('template'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <form role="form" id="emailtemp" name="myform" action="email/addNewAutoEmailTemplate" method="post" enctype="multipart/form-data">                                                                                    

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('category'); ?></label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <div id="divbuttontag"></div>

                        <br><br>
                        <textarea class="ckeditor" name="message" id="editor1" value="" cols="70" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('status'); ?> </label>
                        <select class="form-control" id="status" name="status"> 
                        </select> 
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="type" value='email'>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="common/js/codearistos.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".table").on("click", ".editbutton1", function () {
            var iid = $(this).attr('data-id');
            $('#divbuttontag').html("");

            $.ajax({
                url: 'email/editAutoEmailTemplate?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#emailtemp').find('[name="id"]').val(response.autotemplatename.id).end();
                $('#emailtemp').find('[name="category"]').val(response.autotemplatename.name).end();
                CKEDITOR.instances['editor1'].setData(response.autotemplatename.message);
                //  $('#smstemp').find('[name="message"]').val(response.autotemplatename.message).end();
                var option = '';
                var count = 0;
                $.each(response.autotag, function (index, value) {
                    option += '<input type="button" name="myBtn" value="' + value.name + '" onClick="addtext(this);">';
                    count += 1;
                    if (count % 7 === 0) {
                        option += '<br><br>';
                    }
                });
                $('#divbuttontag').html(option);
                $('#status').html(response.status_options);
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
                url: "email/getAutoEmailTemplateList",
                type: 'POST',
                'data': {'type': 'sms'}
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'><'col-sm-5 text-center'B><'col-sm-4'>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2],
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
        var value = CKEDITOR.instances.editor1.getData()
        value += fired_button;

        // console.log(value);
        CKEDITOR.instances['editor1'].setData(value)
        //  console.log(fired_button);
        //document.myform.message.value += fired_button;
    }
</script>
<script>
    function addtext1(ele) {
        var fired_button = ele.value;
        document.myform1.message.value += fired_button;
    }
</script>
<script>
    $(document).ready(function () {
        CKEDITOR.config.autoParagraph = false;
    });
</script>