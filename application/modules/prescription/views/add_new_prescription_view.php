<!--sidebar end-->
<!--main content start-->


<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
    $doctordetails = $this->db->get_where('doctor', array('id' => $doctor_id))->row();
}
?>


<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-8">
            <header class="panel-heading">
                <?php
                if (!empty($prescription->id))
                    echo lang('edit_prescription');
                else
                    echo lang('add_prescription');
                ?>
            </header>
            <div class="panel col-md-12">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="prescription/addNewPrescription" class="clearfix" method="post" enctype="multipart/form-data">
                            <div class="">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                                    <input type="text" class="form-control default-date-picker" name="date" id="exampleInputEmail1" value='<?php
                                    if (!empty($setval)) {
                                        echo set_value('date');
                                    }
                                    if (!empty($prescription->date)) {
                                        echo date('d-m-Y', $prescription->date);
                                    }
                                    ?>' placeholder="" readonly="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                                    <select class="form-control m-bot15" id="patientchoose" name="patient" value=''>
                                        <?php if (!empty($prescription->patient)) { ?>
                                            <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - (<?php echo lang('id'); ?> : <?php echo $patients->id; ?>)</option>  
                                        <?php } ?>
                                        <?php
                                        if (!empty($setval)) {
                                            $patientdetails = $this->db->get_where('patient', array('id' => set_value('patient')))->row();
                                            ?>
                                            <option value="<?php echo $patientdetails->id; ?>" selected="selected"><?php echo $patientdetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $patientdetails->id; ?>)</option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <?php if (!$this->ion_auth->in_group('Doctor')) { ?>
                                    <div class="form-group col-md-4"> 
                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?></label>
                                        <select class="form-control m-bot15" id="doctorchoose" name="doctor" value=''>
                                            <?php if (!empty($prescription->doctor)) { ?>
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>  
                                            <?php } ?>
                                            <?php
                                            if (!empty($setval)) {
                                                $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                                ?>
                                                <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> -(<?php echo lang('id'); ?> : <?php echo $doctordetails1->id; ?>)</option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group col-md-4"> 
                                        <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?></label>
                                        <?php if (!empty($prescription->doctor)) { ?>
                                            <select class="form-control m-bot15" name="doctor" value=''>
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>  
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control m-bot15" id="doctorchoose1" name="doctor" value=''>
                                                <?php if (!empty($prescription->doctor)) { ?>
                                                    <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>  
                                                <?php } ?>
                                                <?php if (!empty($doctordetails)) { ?>
                                                    <option value="<?php echo $doctordetails->id; ?>" selected="selected"><?php echo $doctordetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>  
                                                <?php } ?>
                                                <?php
                                                if (!empty($setval)) {
                                                    $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                                    ?>
                                                    <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>
                                                <?php }
                                                ?>
                                            </select>
                                        <?php } ?>



                                    </div>
                                <?php } ?>

                                <div class="form-group col-md-6">
                                    <label class="control-label"><?php echo lang('history'); ?></label>
                                    <textarea class="form-control ckeditor" id="editor1" name="symptom" value="" rows="50" cols="20"><?php
                                        if (!empty($setval)) {
                                            echo set_value('symptom');
                                        }
                                        if (!empty($prescription->symptom)) {
                                            echo $prescription->symptom;
                                        }
                                        ?></textarea>
                                </div>



                                <div class="form-group col-md-6">
                                    <label class="control-label"><?php echo lang('note'); ?></label>
                                    <textarea class="form-control ckeditor" id="editor3" name="note" value="" rows="30" cols="20"><?php
                                        if (!empty($setval)) {
                                            echo set_value('note');
                                        }
                                        if (!empty($prescription->note)) {
                                            echo $prescription->note;
                                        }
                                        ?></textarea>
                                </div>

                                <div class="form-group col-md-12 medicine_block">
                                    <label class="control-label col-md-3"> <?php echo lang('medicine'); ?></label>
                                    <div class="col-md-9">
                                        <?php if (empty($prescription->medicine)) { ?>
                                            <select class="form-control m-bot15 medicinee"  id="my_select1_disabled" name="category" value=''>

                                            </select>
                                        <?php } else { ?>
                                            <select name="category"  class="form-control m-bot15 medicinee"  multiple="multiple" id="my_select1_disabled" >
                                                <?php
                                                if (!empty($prescription->medicine)) {

                                                    // $category_name = $payment->category_name;
                                                    $prescription_medicine = explode('###', $prescription->medicine);
                                                    foreach ($prescription_medicine as $key => $value) {
                                                        $prescription_medicine_extended = explode('***', $value);
                                                        $medicine = $this->medicine_model->getMedicineById($prescription_medicine_extended[0]);
                                                        ?>
                                                        <option value="<?php echo $medicine->id . '*' . $medicine->name; ?>"  <?php echo 'data-dosage="' . $prescription_medicine_extended[1] . '"' . 'data-frequency="' . $prescription_medicine_extended[2] . '"data-days="' . $prescription_medicine_extended[3] . '"data-instruction="' . $prescription_medicine_extended[4] . '"'; ?> selected="selected">
                                                            <?php echo $medicine->name; ?>
                                                        </option>                

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 panel-body medicine_block">
                                    <label class="control-label col-md-3"><?php echo lang('medicine'); ?></label>
                                    <div class="col-md-9 medicine pull-right">

                                    </div>

                                </div>



                                <div class="form-group col-md-12">
                                    <label class="control-label"><?php echo lang('advice'); ?></label>
                                    <textarea class="form-control ckeditor" id="editor3" name="advice" value="" rows="30" cols="20"><?php
                                        if (!empty($setval)) {
                                            echo set_value('advice');
                                        }
                                        if (!empty($prescription->advice)) {
                                            echo $prescription->advice;
                                        }
                                        ?>
                                    </textarea>
                                </div>



                                <input type="hidden" name="admin" value='admin'>

                                <input type="hidden" name="id" value='<?php
                                if (!empty($prescription->id)) {
                                    echo $prescription->id;
                                }
                                ?>'>

                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                                </div>
                            </div>

                            <div class="col-md-5">

                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->



<style>

    form{
        border: 0px;
    }

    .med_selected{
        background: #fff;
        padding: 10px 0px;
        margin: 5px;
    }


    .select2-container--bgform .select2-selection--multiple .select2-selection__choice {
        clear: both !important;
    }

    label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 500;
        font-weight: bold;
    }

    .medicine_block{
        background: #f1f2f7;
        padding: 50px !important;
    }


</style>


<script src="common/js/codearistos.min.js"></script>







<script type="text/javascript">
    $(document).ready(function () {
        //   $(".medicine").html("");
        var selected = $('#my_select1_disabled').find('option:selected');
        var unselected = $('#my_select1_disabled').find('option:not(:selected)');
        selected.attr('data-selected', '1');
        $.each(unselected, function (index, value1) {
            if ($(this).attr('data-selected') == '1') {
                var value = $(this).val();
                var res = value.split("*");
                // var unit_price = res[1];
                var id = res[0];
                $('#med_selected_section-' + id).remove();
                // $('#removediv' + $(this).val() + '').remove();
                //this option was selected before

            }
        });

        /* $("select").on("select2:unselect", function (e) {
         var value = e.params.val();
         
         var res = value.split("*");
         // var unit_price = res[1];
         var id = res[0];
         $('#med_selected_section-' + id).remove();
         });
         */


        var count = 0;
        $.each($('select.medicinee option:selected'), function () {
            var value = $(this).val();
            var res = value.split("*");
            // var unit_price = res[1];
            var id = res[0];
            // var id = $(this).data('id');
            var med_id = res[0];
            var med_name = res[1];
            var dosage = $(this).data('dosage');
            var frequency = $(this).data('frequency');
            var days = $(this).data('days');
            var instruction = $(this).data('instruction');
            if ($('#med_id-' + id).length)
            {

            } else {

                $(".medicine").append('<section id="med_selected_section-' + med_id + '" class="med_selected row">\n\
         <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label> <?php echo lang("medicine"); ?> </label>\n\
</div>\n\
\n\
<div class=col-md-12>\n\
<input class = "medi_div" name = "med_id[]" value = "' + med_name + '" placeholder="" required>\n\
 <input type="hidden" id="med_id-' + id + '" class = "medi_div" name = "medicine[]" value = "' + med_id + '" placeholder="" required>\n\
 </div>\n\
 </div>\n\
\n\
<div class = "form-group medicine_sect col-md-2" ><div class=col-md-12>\n\
<label><?php echo lang("dosage"); ?> </label>\n\
</div>\n\
<div class=col-md-12><input class = "state medi_div" name = "dosage[]" value = "' + dosage + '" placeholder="100 mg" required>\n\
 </div>\n\
 </div>\n\
\n\
<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label><?php echo lang("frequency"); ?> </label>\n\
</div>\n\
<div class=col-md-12><input class = "potency medi_div sale" id="salee' + count + '" name = "frequency[]" value = "' + frequency + '" placeholder="1 + 0 + 1" required>\n\
</div>\n\
</div>\n\
\n\
<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label>\n\
<?php echo lang("days"); ?> \n\
</label>\n\
</div>\n\
<div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "days[]" value = "' + days + '" placeholder="7 days" required>\n\
</div>\n\
</div>\n\
\n\
\n\<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label>\n\
<?php echo lang("instruction"); ?> \n\
</label>\n\
</div>\n\
<div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "instruction[]" value = "' + instruction + '" placeholder="After Food" required>\n\
</div>\n\
</div>\n\
\n\
\n\
 <div class="del col-md-1"></div>\n\
</section>');
            }
        });
    }
    );


</script> 





<script type="text/javascript">
    $(document).ready(function () {
        $('.medicinee').change(function () {
            //   $(".medicine").html("");
            var count = 0;


            var selected = $('#my_select1_disabled').find('option:selected');
            var unselected = $('#my_select1_disabled').find('option:not(:selected)');
            selected.attr('data-selected', '1');
            $.each(unselected, function (index, value1) {
                if ($(this).attr('data-selected') == '1') {
                    var value = $(this).val();
                    var res = value.split("*");
                    // var unit_price = res[1];
                    var id = res[0];
                    $('#med_selected_section-' + id).remove();
                    // $('#removediv' + $(this).val() + '').remove();
                    //this option was selected before

                }
            });

            $.each($('select.medicinee option:selected'), function () {
                var value = $(this).val();
                var res = value.split("*");
                // var unit_price = res[1];
                var id = res[0];
                // var id = $(this).data('id');
                var med_id = res[0];
                var med_name = res[1];


                if ($('#med_id-' + id).length)
                {

                } else {


                    $(".medicine").append('<section class="med_selected row" id="med_selected_section-' + med_id + '">\n\
         <div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label> <?php echo lang("medicine"); ?> </label>\n\
</div>\n\
\n\
<div class=col-md-12>\n\
<input class = "medi_div" name = "med_id[]" value = "' + med_name + '" placeholder="" required>\n\
 <input type="hidden" class = "medi_div" id="med_id-' + id + '" name = "medicine[]" value = "' + med_id + '" placeholder="" required>\n\
 </div>\n\
 </div>\n\
\n\
<div class = "form-group medicine_sect col-md-2" ><div class=col-md-12>\n\
<label><?php echo lang("dosage"); ?> </label>\n\
</div>\n\
<div class=col-md-12><input class = "state medi_div" name = "dosage[]" value = "" placeholder="100 mg" required>\n\
 </div>\n\
 </div>\n\
\n\
<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label><?php echo lang("frequency"); ?> </label>\n\
</div>\n\
<div class=col-md-12><input class = "potency medi_div sale" id="salee' + count + '" name = "frequency[]" value = "" placeholder="1 + 0 + 1" required>\n\
</div>\n\
</div>\n\
\n\
<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label>\n\
<?php echo lang("days"); ?> \n\
</label>\n\
</div>\n\
<div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "days[]" value = "" placeholder="7 days" required>\n\
</div>\n\
</div>\n\
\n\
\n\<div class = "form-group medicine_sect col-md-2"><div class=col-md-12>\n\
<label>\n\
<?php echo lang("instruction"); ?> \n\
</label>\n\
</div>\n\
<div class=col-md-12><input class = "potency medi_div quantity" id="quantity' + count + '" name = "instruction[]" value = "" placeholder="After Food" required>\n\
</div>\n\
</div>\n\
\n\
\n\
 <div class="del col-md-1"></div>\n\
</section>');
                }
            });
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
        $("#doctorchoose").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorinfo',
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

<script>
    $(document).ready(function () {
        // $(".flashmessage").delay(3000).fadeOut(100);
        // $("#my_select10").select2();
        $('#my_select1').select2({
            multiple: true,
            placeholder: '<?php echo lang('medicine'); ?>',
            allowClear: true,
            closeOnSelect: true,
            ajax: {
                url: 'medicine/getMedicinenamelist',
                dataType: 'json',
                type: "post",
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data,
                        newTag: true,
                        pagination: {
                            more: (params.page * 1) < data.total_count
                        }
                    };
                },
                cache: true
            },
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#my_select1_disabled").select2({
            placeholder: '<?php echo lang('medicine'); ?>',
            multiple: true,
            allowClear: true,
            ajax: {
                url: 'medicine/getMedicineListForSelect2',
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
    });</script>