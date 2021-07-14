<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="col-md-9">
            <section class="panel">
                <header class="panel-heading">
                    <?php echo lang('send_email'); ?>

                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                        <div id="templatebar" class="pull-right col-md-6 btn-toolbar">
                            <button class='btn green pull-right' onclick="location.href = 'email/sent'" type="button">
                                <?php echo lang('sent_messages'); ?></button>
                            <button class='btn green pull-right' onclick="location.href = 'email/manualEmailTemplate'" type="button">
                                <?php echo lang('template'); ?></button>
                            <button class='btn green pull-right' data-toggle="modal" data-target="#myModal1" type="button">
                                <?php echo lang('add'); ?> <?php echo lang('template'); ?></button>
                        </div>
                    <?php } ?>

                </header>

                <div class="panel-body">  
                    <form role="form" class="clearfix" action="email/send" method="post">
                        <label class="control-label">         
                            <?php echo lang('send_email_to'); ?>
                        </label>    
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios1" value="allpatient">
                                    <?php echo lang('all_patient'); ?>
                                </label>
                            </div>                      
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios2" value="alldoctor">
                                    <?php echo lang('all_doctor'); ?>
                                </label>
                            </div>
                        <?php } ?>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="bloodgroupwise">
                                <?php echo lang('donor'); ?> 
                            </label>
                        </div>


                        <div class="radio pos_client">
                            <label>
                                <?php echo lang('select_blood_group'); ?>
                                <select class="form-control m-bot15" name="bloodgroup" value=''>
                                    <?php foreach ($groups as $group) { ?>
                                        <option value="<?php echo $group->group; ?>"> <?php echo $group->group; ?> </option>
                                    <?php } ?> 
                                </select>
                            </label>

                        </div>




                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="single_patient">
                                <?php echo lang('single_patient'); ?>
                            </label>
                        </div>

                        <div class="radio single_patient">
                            <label>
                                <?php echo lang('select_patient'); ?>
                                <select class="form-control m-bot15" id="patientchoose" name="patient" value=''>
                                    <?php //foreach ($patients as $patient) { ?>
                                        <!--<option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option> -->
                                    <?php //} ?> 
                                </select>
                            </label>

                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" name="radio" id="optionsRadios2" value="other">
                                <?php echo lang('others'); ?>
                            </label>
                        </div>

                        <div class="radio other">
                            <label>
                                <?php echo lang('email'); ?> <?php echo lang('address'); ?>
                                <input type="email" name="other_email" value="" class="form-control">
                            </label>

                        </div>

                        <div class="">
                            <label>
                                <?php echo lang('select_template'); ?>
                                <select class="form-control m-bot15" id='selUser5' name="templatess" style='width: 100%;'>
                                   <!-- <option value='0'><?php echo lang('select_template'); ?></option>-->
                                </select>
                            </label>

                        </div>


                        <div class="form-group">
                            <label class="control-label"><?php echo lang('subject'); ?></label>
                            <input type="text" class="form-control" name="subject" rows="10">
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo lang('message'); ?></label>
                            <?php
                            $count = 0;
                            foreach ($shortcode as $shortcodes) {
                                ?>
                                <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext(this);">
                                <?php
                                $count += 1;
                                if ($count === 7) {
                                    ?>
                                    <br>
                                    <?php
                                }
                            }
                            ?> <br><br>
                            <textarea class="ckeditor" id="editor1" name="message" value="" cols="70" rows="10"></textarea>
                        </div>
                        <input type="hidden" name="id" value=''>

                        <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info col-md-3 pull-right"><i class="fa fa-location-arrow"></i> <?php echo lang('send_email'); ?></button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->







<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <form role="form" name="myform1" action="email/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    

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
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count1 = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                            <?php
                            $count1 += 1;
                            if ($count1 === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>

                        <textarea class="ckeditor" id="editor2"name="message" value='<?php
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
                    <input type="hidden" name="type" value='email'>
                    <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Send SMS To Voters</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="email/sendVoterAreaWise" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea cols="50" rows="10" class="form-control" name="message" id="exampleInputEmail1" value=''> </textarea>
                    </div>
                    <input type="hidden" id="area_id" value="" name="area_id">
                    <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Send SMS To All Volunteer</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="email/sendVolunteer" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea cols="50" rows="10" class="form-control" name="message" id="exampleInputEmail1" value=''> </textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>







<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Send SMS To Volunteers</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="email/sendVolunteerAreaWise" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea cols="50" rows="10" class="form-control" name="message" id="exampleInputEmail1" value=''> </textarea>
                    </div>
                    <input type="hidden" id="area_idd" value="" name="area_id">
                    <button type="submit" name="submit" class="btn btn-info submit_button">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">


                            $(document).ready(function () {
                                $(".voterAW").click(function () {
                                    $("#area_id").val($(this).attr('data-id'));
                                    $('#myModal2').modal('show');
                                });
                                $(".volunteerAW").click(function () {
                                    $("#area_idd").val($(this).attr('data-id'));
                                    $('#myModal4').modal('show');
                                });
                            });

</script>


<script>
    $(document).ready(function () {
        $('.pos_client').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'bloodgroupwise') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });


</script> 

<script>
    $(document).ready(function () {
        $('.single_patient').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'single_patient') {
                $('.single_patient').show();
            } else {
                $('.single_patient').hide();
            }
        });

    });


</script> 

<script>
    $(document).ready(function () {
        $('.other').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'other') {
                $('.other').show();
            } else {
                $('.other').hide();
            }
        });

    });


</script> 


<script>
    $(document).ready(function () {
        $('.staff').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'staff') {
                $('.staff').show();
            } else {
                $('.staff').hide();
            }
        });

    });


</script> 
<script>
    $(document).ready(function () {
        $("#selUser5").select2({
            placeholder: '<?php echo lang('select_template'); ?>',
            allowClear: true,
            ajax: {
                url: 'email/getManualEmailTemplateinfo',
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
<script>
    $(document).ready(function () {
        $('#selUser5').on('change', function () {
            var iid = $(this).val();
            var type = 'email';

            $.ajax({
                url: 'email/getManualEmailTemplateMessageboxText?id=' + iid + '&type=' + type,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {

                CKEDITOR.instances['editor1'].setData(response.user.message)
                //  $('#myform').find('[name="message"]').val(response.user.message).end();
            })
        });
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
        var value = CKEDITOR.instances.editor2.getData()
        value += fired_button;

        // console.log(value);
        CKEDITOR.instances['editor2'].setData(value)
    }
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
    });
</script>