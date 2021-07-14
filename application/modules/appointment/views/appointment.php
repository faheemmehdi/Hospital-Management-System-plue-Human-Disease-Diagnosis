
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('appointment'); ?>
                <div class="clearfix no-print col-md-8 pull-right">
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i>  <?php echo lang('add_appointment'); ?> 
                            </button>
                        </div>
                    </a>
                </div>
            </header>

            <div class="col-md-12">
                <header class="panel-heading tab-bg-dark-navy-blueee row">
                    <ul class="nav nav-tabs col-md-8">
                        <li class="active">
                            <a data-toggle="tab" href="#all"><?php echo lang('all'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#pending"><?php echo lang('pending_confirmation'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#confirmed"><?php echo lang('confirmed'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#treated"><?php echo lang('treated'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#cancelled"><?php echo lang('cancelled'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#requested"><?php echo lang('requested'); ?></a>
                        </li>
                    </ul>

                    <div class="pull-right col-md-4"><div class="pull-right custom_buttonss"></div></div>

                </header>
            </div>


            <div class="">
                <div class="tab-content">
                    <div id="pending" class="tab-pane">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample1" style="width: 100%;">
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
                        </div>
                    </div>
                    <div id="confirmed" class="tab-pane">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample2" style="width: 100%;">
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
                        </div>
                    </div>
                    <div id="treated" class="tab-pane">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample3" style="width: 100%;">
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
                        </div>
                    </div>

                    <div id="cancelled" class="tab-pane">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample4" style="width: 100%;">
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
                        </div>
                    </div>


                    <div id="all" class="tab-pane active">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">

                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample5" style="width: 100%;">
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
                        </div>
                    </div>


                    <div id="requested" class="tab-pane">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample6" style="width: 100%;">
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
                        </div>
                    </div>

                </div>
            </div>


        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->




<!-- Add Appointment Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_appointment'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" action="appointment/addNew" method="post" class="clearfix" enctype="multipart/form-data">
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label> 
                        <select class="form-control m-bot15 pos_select" id="pos_select" name="patient" value=''> 


                        </select>
                    </div>
                    <div class="pos_client clearfix col-md-6">
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
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                        <select class="form-control m-bot15" id="adoctors" name="doctor" value=''>  

                        </select>
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                        <input type="text" class="form-control default-date-picker" id="date" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1">Available Slots</label>
                        <select class="form-control m-bot15" name="time_slot" id="aslots" value=''> 

                        </select>
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
                        <select class="form-control m-bot15" name="status" value=''> 
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
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <!--  <div class="col-md-6 panel">
                          <label> <?php echo lang('send_sms'); ?>  </label> <br>
                          <input type="checkbox" name="sms" class="" value="sms">  <?php echo lang('yes'); ?>
                      </div>-->
                    <div class="col-md-12 panel">
                        <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Appointment Modal-->

<div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
    <div class="modal-dialog modal-lg" role="document" style="width: 80%;">
        <div class="modal-content">
            <!--
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('patient') . " " . lang('history'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            -->
            <div id='medical_history'>
                <div class="col-md-12">

                </div> 
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('edit_appointment'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="editAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label> 
                        <select class="form-control m-bot15  pos_select patient" id="pos_select" name="patient" value=''> 

                        </select>
                    </div>
                    <div class="pos_client clearfix col-md-6">
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
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                        <select class="form-control m-bot15 doctor" id="adoctors1" name="doctor" value=''>  

                        </select>
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                        <input type="text" class="form-control default-date-picker" id="date1" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1">Available Slots</label>
                        <select class="form-control m-bot15" name="time_slot" id="aslots1" value=''> 

                        </select>
                    </div>
                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
                        <select class="form-control m-bot15" name="status" value=''>
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

                    <div class="col-md-6 panel">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <!--    <div class="col-md-6 panel">
                            <label> <?php echo lang('send_sms'); ?> ? </label> <br>
                            <input type="checkbox" name="sms" class="" value="sms">  <?php echo lang('yes'); ?>
                        </div> -->
                    <input type="hidden" name="id" id="appointment_id" value=''>
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
            // e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            var id = $(this).attr('data-id');

            $('#editAppointmentForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'appointment/editAppointmentByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var de = response.appointment.date * 1000;
                var d = new Date(de);
                var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                // Populate the form fields with the data returned from server
                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                $('#editAppointmentForm').find('[name="date"]').val(da).end()
                $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).end()
                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()

                //$('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                // $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');
                var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
                $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
                var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');



                var date = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                var appointment_id = $('#appointment_id').val();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + appointment_id,
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
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                });
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").on("click", ".history", function () {

            //e.preventDefault(e);
            // Get the record's ID via attribute   
            var iid = $(this).attr('data-id');
            //var id = $(this).attr('data-id');
            console.log(iid);
            $('#editAppointmentForm').trigger("reset");
            $.ajax({
                url: 'patient/getMedicalHistoryByjason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                $('#medical_history').html("");
                $('#medical_history').append(response.view);

            });
            $('#cmodal').modal('show');
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
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
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
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
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
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
        });

    }




</script>












<script type="text/javascript">
    $(document).ready(function () {
        $("#adoctors1").change(function () {
            // Get the record's ID via attribute 
            var id = $('#appointment_id').val();
            var date = $('#date1').val();
            var doctorr = $('#adoctors1').val();
            $('#aslots1').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
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
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
            });
        });
    });

    $(document).ready(function () {
        var id = $('#appointment_id').val();
        var date = $('#date1').val();
        var doctorr = $('#adoctors1').val();
        $('#aslots1').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
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
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
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
        var id = $('#appointment_id').val();
        var iid = $('#date1').val();
        var doctorr = $('#adoctors1').val();
        $('#aslots1').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
            url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + iid + '&doctor=' + doctorr + '&appointment_id=' + id,
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
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
        });

    }




</script>

<script>
    $(document).ready(function () {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable
                    .tables({visible: true, api: true})
                    .columns.adjust()
                    .responsive.recalc();
        });
    });
</script>


<script>


    $(document).ready(function () {
        var table = $('#editable-sample5').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getAppoinmentList",
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
<script>


    $(document).ready(function () {
        var table = $('#editable-sample6').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getRequestedAppointmentList",
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

<script>


    $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getPendingAppoinmentList",
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
<script>


    $(document).ready(function () {
        var table = $('#editable-sample2').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getConfirmedAppoinmentList",
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

<script>


    $(document).ready(function () {
        var table = $('#editable-sample3').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getTreatedAppoinmentList",
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

<script>


    $(document).ready(function () {
        var table = $('#editable-sample4').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getCancelledAppoinmentList",
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
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
<script>
    $(document).ready(function () {
        $("#pos_select").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfoWithAddNewOption',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
        $(".patient").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
        $("#adoctors").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorInfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
        $("#adoctors1").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorInfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
    });
</script>