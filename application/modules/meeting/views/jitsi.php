
<section id="main-content">
    <section class="wrapper site-min-height">

        <?php
        $appointment_details = $this->appointment_model->getAppointmentById($appointmentid);
        $doctor_details = $this->doctor_model->getDoctorById($appointment_details->doctor);
        $doctor_name = $doctor_details->name;
        $patient_details = $this->patient_model->getPatientById($appointment_details->patient);
        $patient_name = $patient_details->name;
        $patient_phone = $patient_details->phone;
        $patient_id = $appointment_details->patient;

        $display_name = $this->ion_auth->user()->row()->username;
        $email = $this->ion_auth->user()->row()->email;
        ?>


        <!-- page start-->
        <section class="col-md-8">
            <header class="panel-heading">
                <?php echo lang('live'); ?> <?php echo lang('appointment'); ?> 
            </header>

            <div class="">
                <div class="tab-content"  id="meeting">
                    <input type="hidden" name="appointmentid" id="appointmentid"value="<?php echo $appointmentid; ?>">
                    <input type="hidden" name="username" id="username"value="<?php echo $display_name; ?>">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                </div>
            </div>
        </section>

        <section class="col-md-4">
            <header class="panel-heading">
                <?php echo lang('appointment'); ?> <?php echo lang('details'); ?> 
            </header>

            <div class="">
                <div class="tab-content"  id="">
                    <aside class="profile-nav">
                        <section class="">


                            <ul class="nav nav-pills nav-stacked">
                              <!--  <li class="active"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?><span class="label pull-right r-activity"><?php echo $doctor_name; ?></span></li> -->
                                <li>  <?php echo lang('doctor'); ?> <?php echo lang('name'); ?> <span class="label pull-right r-activity"><?php echo $doctor_name; ?></span></li>
                                <li>  <?php echo lang('patient'); ?> <?php echo lang('name'); ?> <span class="label pull-right r-activity"><?php echo $patient_name; ?></span></li>
                                <li>  <?php echo lang('patient_id'); ?><span class="label pull-right r-activity"><?php echo $patient_id; ?></span></li>
                                <li>  <?php echo lang('appointment'); ?> <?php echo lang('date'); ?> <span class="label pull-right r-activity"><?php echo date('jS F, Y', $appointment_details->date); ?></span></li>
                                <li>  <?php echo lang('appointment'); ?> <?php echo lang('slot'); ?><span class="label pull-right r-activity"><?php echo $appointment_details->time_slot; ?></span></li>
                            </ul>

                        </section>
                    </aside>
                </div>
            </div>
        </section>


        <!-- page end-->
    </section>
</section>




<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"
></script>


<script src="https://meet.jit.si/external_api.js"></script>
<script>
    $(document).ready(function () {
        //  console.log($('#email').val());
        const domain = "meet.jit.si";
        document.getElementById('meeting');
        const options = {
            roomName: "<?php echo $appointment_details->room_id; ?>",
            height: 500,
            parentNode: document.querySelector("#meeting"),
            userInfo: {
                email: $('#email').val(),
                displayName: $('#username').val()
            },
            enableClosePage: true,
            SHOW_PROMOTIONAL_CLOSE_PAGE: true,
            // ALWAYS_TRUST_MODE_ENABLED=true
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    });
</script> 