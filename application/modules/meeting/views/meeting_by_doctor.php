
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-8">
            <header class="panel-heading">
                <?php echo lang('meetings'); ?>

            </header>

            <div class="col-md-12">
                <header class="panel-heading tab-bg-dark-navy-blueee row">
                    <ul class="nav nav-tabs col-md-8">
                        <li class="active">
                            <a data-toggle="tab" href="#calendardetails"><?php echo lang('meetings'); ?> <?php echo lang('calendar'); ?></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#list"><?php echo lang('meetings'); ?></a>
                        </li>

                    </ul>

                    <div class="pull-right col-md-4"><div class="pull-right custom_buttonss"></div></div>

                </header>
            </div>


            <div class="">
                <div class="tab-content">

                    <div id="calendardetails" class="tab-pane active">
                        <div class="">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <aside class="calendar_ui col-md-12 panel calendar_ui">
                                        <section class="">
                                            <div class="">
                                                <div id="calendarview" class="has-toolbar calendar_view"></div>
                                            </div>
                                        </section>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="list" class="tab-pane ">
                        <div class="">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="clearfix">
                                        <button class="export" onclick="javascript:window.print();">Print</button>  
                                    </div>
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                            <tr>
                                                <th> <?php echo lang('id'); ?></th>
                                                <th> <?php echo lang('patient'); ?></th>
                                                <th> <?php echo lang('date-time'); ?></th>
                                                <th> <?php echo lang('remarks'); ?></th>
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

                                        <?php
                                        foreach ($meetings as $meeting) {
                                            if ($meeting->doctor == $doctor_id) {
                                                ?>
                                                <tr class="">
                                                    <td ><?php echo $meeting->id; ?></td>
                                                    <td> <?php echo $this->db->get_where('patient', array('id' => $meeting->patient))->row()->name; ?></td>
                                                    <td class="center"><?php echo date('d-m-Y', $meeting->date); ?> => <?php echo $meeting->time_slot; ?></td>
                                                    <td>
                                                        <?php echo $meeting->remarks; ?>
                                                    </td> 
                                                    <td>
                                                        <!--
                                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $meeting->id; ?>"><i class="fa fa-edit"> <?php echo lang('edit'); ?></i></button>   
                                                        -->
                                                        <a class="btn btn-info btn-xs btn_width delete_button" href="meeting/delete?id=<?php echo $meeting->id; ?>&doctor_id=<?php echo $meeting->doctor; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>




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

        <section class="col-md-4">
            <header class="panel-heading">
                <?php echo lang('doctor'); ?>
            </header>


            <section class="">
                <div class="panel-body profile">
                    <a href="#" class="task-thumb" style="margin-right: 10px;">
                        <img src="<?php
                        if (!empty($mmrdoctor->img_url)) {
                            echo $mmrdoctor->img_url;
                        } else {
                            echo 'uploads/favicon.png';
                        }
                        ?>" height="100" width="100">
                    </a>
                    <div class="task-thumb-details">
                        <h1><a href="#"><?php echo $mmrdoctor->name; ?></a></h1>
                        <p><?php echo $mmrdoctor->profile; ?></p>
                    </div>
                </div>
                <table class="table table-hover personal-task">
                    <tbody>
                        <tr>
                            <td>
                                <i class=" fa fa-envelope"></i>
                            </td>
                            <td><?php echo $mmrdoctor->email; ?></td>

                        </tr>
                        <tr>
                            <td>
                                <i class="fa fa-phone"></i>
                            </td>
                            <td><?php echo $mmrdoctor->phone; ?></td>

                        </tr>

                    </tbody>
                </table>
            </section>
        </section>
    </section>
</section>
<!--main content end-->
<!--footer start-->

<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>  <?php echo lang('edit_meeting'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editMeetingForm" action="meeting/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-3"> 
                            <label for="exampleInputEmail1"> <?php echo lang('paient'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15" id="patientchoose1" name="patient" value=''> 

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3"> 
                            <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label>
                        </div>
                        <div class="col-md-9"> 
                            <select class="form-control m-bot15"id="doctorchoose1" name="doctor" value=''>  

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('date-time'); ?></label>
                        <div data-date="" class="input-group date form_datetime-meridian">
                            <div class="input-group-btn"> 
                                <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                            </div>
                            <input type="text" class="form-control" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                        <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>



                    <input type="hidden" name="id" value=''>


                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->
       <div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
            <div class="modal-dialog modal-lg" role="document" style="width: 80%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo lang('patient') . " " . lang('history'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $(".table").on("click", ".editbutton", function () {
                                                            //  e.preventDefault(e);
                                                            // Get the record's ID via attribute  
                                                            var iid = $(this).attr('data-id');
                                                            $('#editMeetingForm').trigger("reset");
                                                            $('#myModal2').modal('show');
                                                            $.ajax({
                                                                url: 'meeting/editMeetingByJason?id=' + iid,
                                                                method: 'GET',
                                                                data: '',
                                                                dataType: 'json',
                                                            }).success(function (response) {
                                                                // Populate the form fields with the data returned from server
                                                                $('#editMeetingForm').find('[name="id"]').val(response.meeting.id).end()
                                                                //  $('#editMeetingForm').find('[name="patient"]').val(response.meeting.patient).end()
                                                                //  $('#editMeetingForm').find('[name="doctor"]').val(response.meeting.doctor).end()
                                                                $('#editMeetingForm').find('[name="date"]').val(response.meeting.date).end()
                                                                $('#editMeetingForm').find('[name="remarks"]').val(response.meeting.remarks).end()
                                                                var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
                                                                $('#editMeetingForm').find('[name="patient"]').append(option).trigger('change');
                                                                var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                                                                $('#editMeetingForm').find('[name="doctor"]').append(option1).trigger('change');
                                                            });
                                                        });
                                                    });
</script>


<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,
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
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#patientchoose").select2({
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
        $(".patientchoose1").select2({
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
        $("#doctorchoose").select2({
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
        $("#doctorchoose1").select2({
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
<script type="text/javascript">

    $(document).ready(function () {
        $('#calendarview').fullCalendar({
            lang: 'en',
            events: 'meeting/getMeetingByJasonByDoctor?id=' +<?php echo $doctor_id; ?>,
            header:
                    {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay',
                    },
            /*    timeFormat: {// for event elements
             'month': 'h:mm TT A {h:mm TT}', // default
             'week': 'h:mm TT A {h:mm TT}', // default
             'day': 'h:mm TT A {h:mm TT}'  // default
             },
             
             */
            timeFormat: 'h(:mm) A',
            eventRender: function (event, element) {
                element.find('.fc-time').html(element.find('.fc-time').text());
                element.find('.fc-title').html(element.find('.fc-title').text());

            },
            eventClick: function (event) {
                $('#medical_history').html("");
                if (event.id) {
                    $.ajax({
                        url: 'patient/getMedicalHistoryByJason?id=' + event.id,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function (response) {
                        // Populate the form fields with the data returned from server
                        $('#medical_history').html("");
                        $('#medical_history').append(response.view);
                    });
                    //alert(event.id);

                }

                $('#cmodal').modal('show');
            },
            slotDuration: '00:5:00',
            businessHours: false,
            slotEventOverlap: false,
            editable: false,
            selectable: false,
            lazyFetching: true,
            minTime: "6:00:00",
            maxTime: "24:00:00",
            defaultView: 'month',
            allDayDefault: false,
            displayEventEnd: true,
            timezone: false,
        });
    });

</script>


<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
