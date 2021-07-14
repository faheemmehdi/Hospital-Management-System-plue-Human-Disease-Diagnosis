
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('meeting'); ?> <?php echo lang('requests'); ?>
                <div class=" col-md-4 pull-right">
                    <div class="pull-right custom_buttons"></div>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                <th> <?php echo lang('patient'); ?></th>
                                <th> <?php echo lang('doctor'); ?></th>
                                <th> <?php echo lang('date-time'); ?></th>
                                <th> <?php echo lang('remarks'); ?></th>
                                <th> <?php echo lang('status'); ?></th>
                                <th> <?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }

                        </style>



                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->




<!-- Add Meeting Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_meeting'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" action="meeting/addNew" method="post" class="clearfix" enctype="multipart/form-data">
                    <div class="col-md-4 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label> 
                        <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="patient" value=''> 
                            <option value="">Select</option>
                            <option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->id; ?>" <?php
                                if (!empty($payment->patient)) {
                                    if ($payment->patient == $patient->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patient->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="pos_client clearfix col-md-4">
                        <div class="payment pad_bot pull-right">
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label> 
                            <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
                        </div>
                        <div class="payment pad_bot pull-right">
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                            <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
                        </div>
                        <div class="payment pad_bot pull-right">
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                            <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
                        </div>
                        <div class="payment pad_bot pull-right">
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label> 
                            <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
                        </div> 
                        <div class="payment pad_bot"> 
                            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                            <select class="form-control" name="p_gender" value=''>

                                <option value="Male" <?php
                                if (!empty($patient->sex)) {
                                    if ($patient->sex == 'Male') {
                                        echo 'selected';
                                    }
                                }
                                ?> > Male </option>   
                                <option value="Female" <?php
                                if (!empty($patient->sex)) {
                                    if ($patient->sex == 'Female') {
                                        echo 'selected';
                                    }
                                }
                                ?> > Female </option>
                                <option value="Others" <?php
                                if (!empty($patient->sex)) {
                                    if ($patient->sex == 'Others') {
                                        echo 'selected';
                                    }
                                }
                                ?> > Others </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 panel">
                        <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                        <select class="form-control m-bot15 js-example-basic-single" id="adoctors" name="doctor" value=''>  
                            <option value="">Select</option>
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                        <input type="text" class="form-control default-date-picker" id="date" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1">Available Slots</label>
                        <select class="form-control m-bot15" name="time_slot" id="aslots" value=''> 

                        </select>
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('meeting'); ?> <?php echo lang('status'); ?></label> 
                        <select class="form-control m-bot15" name="status" value=''>
                            <option value="Requested" <?php
                            ?> > <?php echo lang('requested'); ?> </option> 
                            <option value="Pending Confirmation" <?php
                            ?> > <?php echo lang('pending_confirmation'); ?> </option>
                            <option value="Confirmed" <?php
                            ?> > <?php echo lang('confirmed'); ?> </option>
                            <option value="Treated" <?php
                            ?> > <?php echo lang('treated'); ?> </option>
                            <option value="Cancelled" <?php
                            ?> > <?php echo lang('cancelled'); ?> </option>
                        </select>
                    </div>
                    <div class="col-md-8 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <!--     <div class="col-md-6 panel">
                         <label> <?php echo lang('send_sms'); ?>  </label> <br>
                         <input type="checkbox" name="sms" class="" value="sms">  <?php echo lang('yes'); ?>
                     </div>
                    <!--  
                                      <input type="hidden" name="redirect" value='meeting/request'>
                  
                                      <div class="col-md-12 panel">
                                          <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                                      </div>
                                  </form>
                              </div>
                          </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- Add Meeting Modal-->







        <!-- Edit Event Modal-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg"">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">  <?php echo lang('edit_meeting'); ?></h4>
                    </div>
                    <div class="modal-body row">
                        <form role="form" id="editMeetingForm" action="meeting/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                            <div class="col-md-4 panel">
                                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label> 
                                <select class="form-control m-bot15 js-example-basic-single pos_select patient" id="pos_select" name="patient" value=''> 
                                    <option value="">Select</option>
                                    <option value="add_new" style="color: #41cac0 !important;"><?php echo lang('add_new'); ?></option>
                                    <?php foreach ($patients as $patient) { ?>
                                        <option value="<?php echo $patient->id; ?>" <?php
                                        if (!empty($payment->patient)) {
                                            if ($payment->patient == $patient->id) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> ><?php echo $patient->name; ?> </option>
                                            <?php } ?>
                                </select>
                            </div>
                            <div class="pos_client clearfix col-md-4">
                                <div class="payment pad_bot pull-right">
                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label> 
                                    <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
                                </div>
                                <div class="payment pad_bot pull-right">
                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                    <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
                                </div>
                                <div class="payment pad_bot pull-right">
                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                    <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
                                </div>
                                <div class="payment pad_bot pull-right">
                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label> 
                                    <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
                                </div> 
                                <div class="payment pad_bot"> 
                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                    <select class="form-control" name="p_gender" value=''>

                                        <option value="Male" <?php
                                        if (!empty($patient->sex)) {
                                            if ($patient->sex == 'Male') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > Male </option>   
                                        <option value="Female" <?php
                                        if (!empty($patient->sex)) {
                                            if ($patient->sex == 'Female') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > Female </option>
                                        <option value="Others" <?php
                                        if (!empty($patient->sex)) {
                                            if ($patient->sex == 'Others') {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > Others </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 panel">
                                <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                                <select class="form-control m-bot15 js-example-basic-single doctor" id="adoctors1" name="doctor" value=''>  
                                    <option value="">Select</option>
                                    <?php foreach ($doctors as $doctor) { ?>
                                        <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4 panel">
                                <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                                <input type="text" class="form-control default-date-picker" id="date1" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="col-md-6 panel">
                                <label for="exampleInputEmail1">Available Slots</label>
                                <select class="form-control m-bot15" name="time_slot" id="aslots1" value=''> 

                                </select>
                            </div>
                            <div class="col-md-6 panel">
                                <label for="exampleInputEmail1"> <?php echo lang('meeting'); ?> <?php echo lang('status'); ?></label> 
                                <select class="form-control m-bot15" name="status" value=''>
                                    <option value="Requested" <?php
                                    ?> > <?php echo lang('requested'); ?> </option> 
                                    <option value="Pending Confirmation" <?php
                                    ?> > <?php echo lang('pending_confirmation'); ?> </option>
                                    <option value="Confirmed" <?php
                                    ?> > <?php echo lang('confirmed'); ?> </option>
                                    <option value="Treated" <?php
                                    ?> > <?php echo lang('treated'); ?> </option>
                                    <option value="Cancelled" <?php
                                    ?> > <?php echo lang('cancelled'); ?> </option>
                                </select>
                            </div>

                            <div class="col-md-8 panel">
                                <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                            <div class="col-md-6 panel">
                                <label> <?php echo lang('send_sms'); ?> ? </label> <br>
                                <input type="checkbox" name="sms" class="" value="sms">  <?php echo lang('yes'); ?>
                            </div>
                            <input type="hidden" name="redirect" value='meeting/request'>
                            <input type="hidden" name="id" id="meeting_id" value=''>
                            <div class="col-md-12 panel">
                                <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                            </div>
                        </form>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- Edit Event Modal-->

        <script src="common/js/codearistos.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".table").on("click", ".editbutton", function () {
                    //e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    var id = $(this).attr('data-id');

                    $('#editMeetingForm').trigger("reset");
                    $('#myModal2').modal('show');
                    $.ajax({
                        url: 'meeting/editMeetingByJason?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function (response) {
                        var de = response.meeting.date * 1000;
                        var d = new Date(de);
                        var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                        // Populate the form fields with the data returned from server
                        $('#editMeetingForm').find('[name="id"]').val(response.meeting.id).end()
                        $('#editMeetingForm').find('[name="patient"]').val(response.meeting.patient).end()
                        $('#editMeetingForm').find('[name="doctor"]').val(response.meeting.doctor).end()
                        $('#editMeetingForm').find('[name="date"]').val(da).end()
                        $('#editMeetingForm').find('[name="status"]').val(response.meeting.status).end()
                        $('#editMeetingForm').find('[name="remarks"]').val(response.meeting.remarks).end()

                        $('.js-example-basic-single.doctor').val(response.meeting.doctor).trigger('change');
                        $('.js-example-basic-single.patient').val(response.meeting.patient).trigger('change');




                        var date = $('#date1').val();
                        var doctorr = $('#adoctors1').val();
                        var meeting_id = $('#meeting_id').val();
                        // $('#default').trigger("reset");
                        $.ajax({
                            url: 'schedule/getAvailableSlotByDoctorByDateByMeetingIdByJason?date=' + date + '&doctor=' + doctorr + '&meeting_id=' + meeting_id,
                            method: 'GET',
                            data: '',
                            dataType: 'json',
                        }).success(function (response) {
                            $('#aslots1').find('option').remove();
                            var slots = response.aslots;
                            $.each(slots, function (key, value) {
                                $('#aslots1').append($('<option>').text(value).val(value)).end();
                            });

                            $("#aslots1").val(response.current_value)
                                    .find("option[value=" + response.current_value + "]").attr('selected', true);
                            //  $('#aslots1 option[value=' + response.current_value + ']').attr("selected", "selected");
                            //   $("#default-step-1 .button-next").trigger("click");
                            if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                                $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                            }
                            // Populate the form fields with the data returned from server
                            //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                        });
                    });
                });
            });
        </script>




        <script>
            $(document).ready(function () {
                $('.pos_client').hide();
                $(document.body).on('change', '#pos_select', function () {

                    var v = $("select.pos_select option:selected").val()
                    if (v == 'add_new') {
                        $('.pos_client').show();
                    } else {
                        $('.pos_client').hide();
                    }
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
                        url: "meeting/getRequestedAppoinmentList",
                        type: 'POST',
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
                                columns: [0, 1, 2, 3, 4, 5],
                            }
                        },
                    ],
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ],
                    iDisplayLength: 100,
                    "order": [[0, "desc"]],
                    "language": {
                        "lengthMenu": "_MENU_",
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        "url": "common/assets/DataTables/languages/english.json"
                    },
                });
                table.buttons().container().appendTo('.custom_buttons');
            });
        </script>






        <script type="text/javascript">
            $(document).ready(function () {
                $("#adoctors").change(function () {
                    // Get the record's ID via attribute  
                    var iid = $('#date').val();
                    var doctorr = $('#adoctors').val();
                    $('#aslots').find('option').remove();
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function (response) {
                        var slots = response.aslots;
                        $.each(slots, function (key, value) {
                            $('#aslots').append($('<option>').text(value).val(value)).end();
                        });
                        //   $("#default-step-1 .button-next").trigger("click");
                        if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                            $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                        }
                        // Populate the form fields with the data returned from server
                        //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                    });
                });

            });

            $(document).ready(function () {
                var iid = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                });

            });




            $(document).ready(function () {
                $('#date').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose: true,
                })
                        //Listen for the change even on the input
                        .change(dateChanged)
                        .on('changeDate', dateChanged);
            });

            function dateChanged() {
                // Get the record's ID via attribute  
                var iid = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }


                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                });

            }




        </script>












        <script type="text/javascript">
            $(document).ready(function () {
                $("#adoctors1").change(function () {
                    // Get the record's ID via attribute 
                    var id = $('#meeting_id').val();
                    var date = $('#date1').val();
                    var doctorr = $('#adoctors1').val();
                    $('#aslots1').find('option').remove();
                    // $('#default').trigger("reset");
                    $.ajax({
                        url: 'schedule/getAvailableSlotByDoctorByDateByMeetingIdByJason?date=' + date + '&doctor=' + doctorr + '&meeting_id=' + id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function (response) {
                        var slots = response.aslots;
                        $.each(slots, function (key, value) {
                            $('#aslots1').append($('<option>').text(value).val(value)).end();
                        });
                        //   $("#default-step-1 .button-next").trigger("click");
                        if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                            $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                        }
                        // Populate the form fields with the data returned from server
                        //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                    });
                });
            });

            $(document).ready(function () {
                var id = $('#meeting_id').val();
                var date = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                $('#aslots1').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByMeetingIdByJason?date=' + date + '&doctor=' + doctorr + '&meeting_id=' + id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots1').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                });

            });




            $(document).ready(function () {
                $('#date1').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose: true,
                })
                        //Listen for the change even on the input
                        .change(dateChanged1)
                        .on('changeDate', dateChanged1);
            });

            function dateChanged1() {
                // Get the record's ID via attribute  
                var id = $('#meeting_id').val();
                var iid = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                $('#aslots1').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByMeetingIdByJason?date=' + iid + '&doctor=' + doctorr + '&meeting_id=' + id,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).success(function (response) {
                    var slots = response.aslots;
                    $.each(slots, function (key, value) {
                        $('#aslots1').append($('<option>').text(value).val(value)).end();
                    });
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                        $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }


                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.meeting.staff).end()
                });

            }




        </script>







        <script>
            $(document).ready(function () {
                $(".flashmessage").delay(3000).fadeOut(100);
            });
        </script>
