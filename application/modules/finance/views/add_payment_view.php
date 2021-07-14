<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <?php
                if (!empty($payment->id))
                    echo lang('edit_payment');
                else
                    echo lang('add_new_payment');
                ?>
            </header>
            <div class="">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <!--  <div class="col-lg-12"> -->
                        <div class="">
                           <!--   <section class="panel"> -->
                            <section class="">
                                <!--   <div class="panel-body"> -->
                                <div class="">
                                    <style> 
                                        .payment{
                                            padding-top: 10px;
                                            padding-bottom: 0px;
                                            border: none;

                                        }
                                        .pad_bot{
                                            padding-bottom: 5px;
                                        }  

                                        form{
                                            background: #f1f1f1;
                                            padding: 15px 0px;
                                        }

                                        .modal-body form{
                                            background: #fff;
                                            padding: 21px;
                                        }

                                        .remove{
                                            width: 20%;
                                            float: right;
                                            margin-bottom: 10px;
                                            padding: 10px;
                                            height: 39px;
                                            text-align: center;
                                            border-bottom: 1px solid #f1f1f1;
                                        }

                                        .remove1{
                                            width: 80%;
                                            float: left;
                                            margin-bottom: 10px;
                                            border-bottom: 1px solid #f1f1f1;
                                        }

                                        form input {
                                            border: none;
                                        }

                                        .pos_box_title{
                                            border: none;
                                        }

                                        .payment_label {
                                            text-align: left;
                                        }

                                    </style>

                                    <form role="form" id="editPaymentForm" class="clearfix" action="finance/addPayment" method="post" enctype="multipart/form-data">

                                        <div class="col-md-5 row">
                                            <!--
                                            <div class="pull-right">
                                                <a data-toggle="modal" href="#myModal">
                                                    <div class="btn-group">
                                                        <button id="" class="btn green">
                                                            <i class="fa fa-plus-circle"></i> <?php echo lang('register_new_patient'); ?>
                                                        </button>
                                                    </div>
                                                </a>
                                            </div>
                                            -->

                                            <!--
                                            <div class="col-md-8 payment pad_bot">
                                                <div class="col-md-3 payment_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('date'); ?> </label>
                                                </div>
                                                <div class="col-md-9"> 
                                                    <input type="text" class="form-control  default-date-picker" name="date" id="" value='<?php
                                            if (!empty($payment->date)) {
                                                echo date('d-m-Y');
                                            } else {
                                                echo date('d-m-Y');
                                            }
                                            ?>' placeholder=" ">
                                                </div>

                                            </div>
                                            -->

                                            <div class="col-md-12 payment pad_bot">
                                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                                <select class="form-control m-bot15  pos_select" id="pos_select" name="patient" value=''> 
                                                    <?php if (!empty($payment)) { ?>
                                                        <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div> 


                                            <div class="pos_client">
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                                    if (!empty($payment->p_name)) {
                                                        echo $payment->p_name;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="p_email" value='<?php
                                                    if (!empty($payment->p_email)) {
                                                        echo $payment->p_email;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="p_phone" value='<?php
                                                    if (!empty($payment->p_phone)) {
                                                        echo $payment->p_phone;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="p_age" value='<?php
                                                    if (!empty($payment->p_age)) {
                                                        echo $payment->p_age;
                                                    }
                                                    ?>' placeholder="">
                                                </div> 
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                                    <select class="form-control m-bot15" name="p_gender" value=''>

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

                                            <div class="col-md-12 payment pad_bot">
                                                <label for="exampleInputEmail1"> <?php echo lang('refd_by_doctor'); ?></label>
                                                <select class="form-control m-bot15  add_doctor" id="add_doctor" name="doctor" value=''>  
                                                    <?php if (!empty($payment)) { ?>
                                                        <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="pos_doctor">
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="d_name" value='<?php
                                                    if (!empty($payment->p_name)) {
                                                        echo $payment->p_name;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="col-md-6 payment pad_bot">
                                                    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="d_email" value='<?php
                                                    if (!empty($payment->p_email)) {
                                                        echo $payment->p_email;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                                <div class="col-md-6 payment pad_bot"> 
                                                    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
                                                    <input type="text" class="form-control pay_in" name="d_phone" value='<?php
                                                    if (!empty($payment->p_phone)) {
                                                        echo $payment->p_phone;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                            </div>



                                            <div class="col-md-12 payment">
                                                <div class="form-group last"> 
                                                    <label for="exampleInputEmail1"> <?php echo lang('select'); ?></label>
                                                    <select name="category_name[]" id="" class="multi-select" multiple="" id="my_multi_select3" >
                                                        <?php foreach ($categories as $category) { ?>
                                                            <option class="ooppttiioonn" data-id="<?php echo $category->c_price; ?>" data-idd="<?php echo $category->id; ?>" data-cat_name="<?php echo $category->category; ?>" value="<?php echo $category->category; ?>" 

                                                                    <?php
                                                                    if (!empty($payment->category_name)) {
                                                                        $category_name = $payment->category_name;
                                                                        $category_name1 = explode(',', $category_name);
                                                                        foreach ($category_name1 as $category_name2) {
                                                                            $category_name3 = explode('*', $category_name2);
                                                                            if ($category_name3[0] == $category->id) {
                                                                                echo 'data-qtity=' . $category_name3[3];
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>


                                                                    <?php
                                                                    if (!empty($payment->category_name)) {
                                                                        $category_name = $payment->category_name;
                                                                        $category_name1 = explode(',', $category_name);
                                                                        foreach ($category_name1 as $category_name2) {
                                                                            $category_name3 = explode('*', $category_name2);
                                                                            if ($category_name3[0] == $category->id) {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>><?php echo $category->category; ?></option>
                                                                <?php } ?>
                                                    </select>
                                                </div>

                                            </div>



                                        </div>


                                        <div class="col-md-4">


                                            <div class="col-md-12 qfloww">

                                                <label class=" col-md-10 pull-left remove1"><?php echo lang('items') ?></label><label class="pull-right col-md-2 remove"><?php echo lang('qty') ?></label>


                                            </div>

                                        </div>



                                        <div class="col-md-3">
                                            <div class="col-md-12 payment right-six">
                                                <div class="payment_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('sub_total'); ?> </label>
                                                </div>
                                                <div class=""> 
                                                    <input type="text" class="form-control pay_in" name="subtotal" id="subtotal" value='<?php
                                                    if (!empty($payment->amount)) {

                                                        echo $payment->amount;
                                                    }
                                                    ?>' placeholder=" " disabled>
                                                </div>

                                            </div>


                                            <div class="col-md-12 payment right-six">
                                                <div class="payment_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('discount'); ?>  <?php
                                                        if ($discount_type == 'percentage') {
                                                            echo ' (%)';
                                                        }
                                                        ?> </label>
                                                </div>
                                                <div class=""> 
                                                    <input type="text" class="form-control pay_in" name="discount" id="dis_id" value='<?php
                                                    if (!empty($payment->discount)) {
                                                        $discount = explode('*', $payment->discount);
                                                        echo $discount[0];
                                                    }
                                                    ?>' placeholder="">
                                                </div>

                                            </div>

                                            <div class="col-md-12 payment right-six">
                                                <div class="payment_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('gross_total'); ?> </label>
                                                </div>
                                                <div class=""> 
                                                    <input type="text" class="form-control pay_in" name="grsss" id="gross" value='<?php
                                                    if (!empty($payment->gross_total)) {

                                                        echo $payment->gross_total;
                                                    }
                                                    ?>' placeholder=" " disabled>
                                                </div>

                                            </div>


                                            <div class="col-md-12 payment right-six">
                                                <div class="payment_label"> 
                                                    <label for="exampleInputEmail1"><?php echo lang('note'); ?> </label>
                                                </div>
                                                <div class=""> 
                                                    <input type="text" class="form-control pay_in" name="remarks" id="" value='<?php
                                                    if (!empty($payment->remarks)) {

                                                        echo $payment->remarks;
                                                    }
                                                    ?>' placeholder=" ">
                                                </div>

                                            </div>  

                                            <div class="col-md-12 payment right-six">

                                                <div class="payment_label"> 
                                                    <label for="exampleInputEmail1"><?php
                                                        if (empty($payment)) {
                                                            echo lang('deposited_amount');
                                                        } else {
                                                            echo lang('deposit') . ' 1 <br>';
                                                            echo date('d/m/Y', $payment->date);
                                                        };
                                                        ?> </label>
                                                </div>

                                                <div class=""> 
                                                    <input type="text" class="form-control pay_in" name="amount_received" id="amount_received" value='<?php
                                                    if (!empty($payment->amount_received)) {

                                                        echo $payment->amount_received;
                                                    }
                                                    ?>' placeholder=" " <?php
                                                           if (!empty($payment->deposit_type)) {
                                                               if ($payment->deposit_type == 'Card') {
                                                                   echo 'readonly';
                                                               }
                                                           }
                                                           ?>>
                                                </div>

                                            </div>





                                            <?php if (empty($payment->id)) { ?>
                                                <div class="col-md-12 payment right-six">
                                                    <div class="payment_label"> 
                                                        <label for="exampleInputEmail1"><?php echo lang('deposit_type'); ?></label>
                                                    </div>
                                                    <div class=""> 
                                                        <select class="form-control m-bot15 js-example-basic-single selecttype" id="selecttype" name="deposit_type" value=''> 
                                                            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) { ?>
                                                                <option value="Cash"> <?php echo lang('cash'); ?> </option>
                                                                <option value="Card"> <?php echo lang('card'); ?> </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>

                                                    <?php
                                                    $payment_gateway = $settings->payment_gateway;
                                                    ?>



                                                    <div class = "card">

                                                        <hr>
                                                        <div class="col-md-12 payment pad_bot">
                                                            <label for="exampleInputEmail1"> <?php echo lang('accepted'); ?> <?php echo lang('cards'); ?></label>
                                                            <div class="payment pad_bot">
                                                                <img src="uploads/card.png" width="100%">
                                                            </div> 
                                                        </div>

                                                        <?php
                                                        if ($payment_gateway == 'PayPal') {
                                                            ?>
                                                            <div class="col-md-12 payment pad_bot">
                                                                <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('type'); ?></label>
                                                                <select class="form-control m-bot15" name="card_type" value=''>

                                                                    <option value="Mastercard"> <?php echo lang('mastercard'); ?> </option>   
                                                                    <option value="Visa"> <?php echo lang('visa'); ?> </option>
                                                                    <option value="American Express" > <?php echo lang('american_express'); ?> </option>
                                                                </select>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($payment_gateway == '2Checkout' || $payment_gateway == 'PayPal') {
                                                            ?>
                                                            <div class="col-md-12 payment pad_bot">
                                                                <label for="exampleInputEmail1"> <?php echo lang('cardholder'); ?> <?php echo lang('name'); ?></label>
                                                                <input type="text"  id="cardholder" class="form-control pay_in" name="cardholder" value='' placeholder="">
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($payment_gateway != 'Pay U Money' && $payment_gateway != 'Paystack' && $payment_gateway != 'SSLCOMMERZ' && $payment_gateway != 'Paytm') { ?>
                                                            <div class="col-md-12 payment pad_bot">
                                                                <label for="exampleInputEmail1"> <?php echo lang('card'); ?> <?php echo lang('number'); ?></label>
                                                                <input type="text"  id="card" class="form-control pay_in" name="card_number" value='' placeholder="">
                                                            </div>



                                                            <div class="col-md-8 payment pad_bot">
                                                                <label for="exampleInputEmail1"> <?php echo lang('expire'); ?> <?php echo lang('date'); ?></label>
                                                                <input type="text" class="form-control pay_in" id="expire" data-date="" data-date-format="MM YY" placeholder="Expiry (MM/YY)" name="expire_date" maxlength="7" aria-describedby="basic-addon1" value='' placeholder="">
                                                            </div>
                                                            <div class="col-md-4 payment pad_bot">
                                                                <label for="exampleInputEmail1"> <?php echo lang('cvv'); ?> </label>
                                                                <input type="text" class="form-control pay_in" id="cvv" maxlength="3" name="cvv" value='' placeholder="">
                                                            </div> 

                                                        </div>

                                                        <?php
                                                    }
                                                    ?>

                                                </div> 
                                            <?php } ?>

                                            <?php
                                            if (!empty($payment)) {
                                                $deposits = $this->finance_model->getDepositByPaymentId($payment->id);
                                                $i = 1;
                                                foreach ($deposits as $deposit) {

                                                    if (empty($deposit->amount_received_id)) {
                                                        $i = $i + 1;
                                                        ?>
                                                        <div class="col-md-12 payment right-six">
                                                            <div class="payment_label"> 
                                                                <label for="exampleInputEmail1"><?php echo lang('deposit'); ?> <?php
                                                                    echo $i . '<br>';
                                                                    echo date('d/m/Y', $deposit->date);
                                                                    ?> 
                                                                </label>
                                                            </div>
                                                            <div class=""> 
                                                                <input type="text" class="form-control pay_in" name="deposit_edit_amount[]" id="amount_received" value='<?php echo $deposit->deposited_amount; ?>' <?php
                                                                if ($deposit->deposit_type == 'Card') {
                                                                    echo 'readonly';
                                                                }
                                                                ?>>
                                                                <input type="hidden" class="form-control pay_in" name="deposit_edit_id[]" id="amount_received" value='<?php echo $deposit->id; ?>' placeholder=" ">
                                                            </div>

                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                            <div class="form-group cashsubmit payment  right-six col-md-12">
                                                <button type="submit" name="submit2" id="submit1" class="btn btn-info row pull-right"> <?php echo lang('submit'); ?></button>
                                            </div>
                                             <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
                                            <div class="form-group cardsubmit  right-six col-md-12 hidden">
                                                <button type="submit" name="pay_now" id="submit-btn" class="btn btn-info row pull-right" <?php if ($settings->payment_gateway == 'Stripe') {
                                                ?>onClick="stripePay(event);"<?php }
                                            ?> <?php if ($settings->payment_gateway == '2Checkout' && $twocheckout->status=='live') {
                                                ?>onClick="twoCheckoutPay(event);"<?php }
                                            ?>> <?php echo lang('submit'); ?></button>
                                            </div>


                                        </div>








                                        <!--
                                        <div class="col-md-12 payment">
                                            <div class="col-md-3 payment_label"> 
                                              <label for="exampleInputEmail1">Vat (%)</label>
                                            </div>
                                            <div class="col-md-9"> 
                                              <input type="text" class="form-control pay_in" name="vat" id="exampleInputEmail1" value='<?php
                                        if (!empty($payment->vat)) {
                                            echo $payment->vat;
                                        }
                                        ?>' placeholder="%">
                                            </div>
                                        </div>
                                        -->

                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($payment->id)) {
                                            echo $payment->id;
                                        }
                                        ?>'>
                                        <div class="row">
                                        </div>
                                        <div class="form-group">
                                        </div>

                                </div>
                                </form>





                        </div>
                        </section>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </section>
</section>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>


<!--

<script>
    $(document).ready(function () {
        $('.multi-select').change(function () {
            $(".qfloww").html("");
            var tot = 0;
            $.each($('select.multi-select option:selected'), function () {
                var curr_val = $(this).data('id');
                var idd = $(this).data('idd');
                tot = tot + curr_val;
                var cat_name = $(this).data('cat_name');
                $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div><br>')
            });
            var discount = $('#dis_id').val();
<?php
if ($discount_type == 'flat') {
    ?>
                                                                                                                                                                                var gross = tot - discount;
<?php } else { ?>
                                                                                                                                                                                var gross = tot - tot * discount / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
            $('#editPaymentForm').find('[name="grsss"]').val(gross)
        }

        );


    });

    $(document).ready(function () {
        $('#dis_id').keyup(function () {
            var val_dis = 0;
            var amount = 0;
            var ggggg = 0;
            amount = $('#subtotal').val();
            val_dis = this.value;
<?php
if ($discount_type == 'flat') {
    ?>
                                                                                                                                                                                ggggg = amount - val_dis;
<?php } else { ?>
                                                                                                                                                                                ggggg = amount - amount * val_dis / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="grsss"]').val(ggggg)
        });
    });

</script> 

<script>
    $(document).ready(function () {

        $(".qfloww").html("");
        var tot = 0;
        $.each($('select.multi-select option:selected'), function () {
            var curr_val = $(this).data('id');
            var idd = $(this).data('idd');
            tot = tot + curr_val;
            var cat_name = $(this).data('cat_name');
            $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div><br>')
        });
        var discount = $('#dis_id').val();
<?php
if ($discount_type == 'flat') {
    ?>
                                                                                                                                                                            var gross = tot - discount;
<?php } else { ?>
                                                                                                                                                                            var gross = tot - tot * discount / 100;
<?php } ?>
        $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
        $('#editPaymentForm').find('[name="grsss"]').val(gross)

    });

    $(document).ready(function () {
        $('#dis_id').keyup(function () {
            var val_dis = 0;
            var amount = 0;
            var ggggg = 0;
            amount = $('#subtotal').val();
            val_dis = this.value;
<?php
if ($discount_type == 'flat') {
    ?>
                                                                                                                                                                                ggggg = amount - val_dis;
<?php } else { ?>
                                                                                                                                                                                ggggg = amount - amount * val_dis / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="grsss"]').val(ggggg)
        });
    });

</script> 

-->



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="common/js/ajaxrequest-codearistos.min.js"></script>



<script>
                                                    $(document).ready(function () {

                                                        var tot = 0;
                                                        //  $(".qfloww").html("");
                                                        $(".ms-selected").click(function () {
                                                            var idd = $(this).data('idd');
                                                            $('#id-div' + idd).remove();
                                                            $('#idinput-' + idd).remove();
                                                            $('#categoryinput-' + idd).remove();

                                                        });
                                                        $.each($('select.multi-select option:selected'), function () {
                                                            var curr_val = $(this).data('id');
                                                            var idd = $(this).data('idd');
                                                            var qtity = $(this).data('qtity');
                                                            //  tot = tot + curr_val;
                                                            var cat_name = $(this).data('cat_name');
                                                            if ($('#idinput-' + idd).length)
                                                            {

                                                            } else {
                                                                if ($('#id-div' + idd).length)
                                                                {

                                                                } else {
                                                                    $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div>')
                                                                }


                                                                var input2 = $('<input>').attr({
                                                                    type: 'text',
                                                                    class: "remove",
                                                                    id: 'idinput-' + idd,
                                                                    name: 'quantity[]',
                                                                    value: qtity,
                                                                }).appendTo('#editPaymentForm .qfloww');

                                                                $('<input>').attr({
                                                                    type: 'hidden',
                                                                    class: "remove",
                                                                    id: 'categoryinput-' + idd,
                                                                    name: 'category_id[]',
                                                                    value: idd,
                                                                }).appendTo('#editPaymentForm .qfloww');
                                                            }


                                                            $(document).ready(function () {
                                                                $('#idinput-' + idd).keyup(function () {
                                                                    var qty = 0;
                                                                    var total = 0;
                                                                    $.each($('select.multi-select option:selected'), function () {
                                                                        var id1 = $(this).data('idd');
                                                                        qty = $('#idinput-' + id1).val();
                                                                        var ekokk = $(this).data('id');
                                                                        total = total + qty * ekokk;
                                                                    });

                                                                    tot = total;

                                                                    var discount = $('#dis_id').val();
                                                                    var gross = tot - discount;
                                                                    $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                                                                    $('#editPaymentForm').find('[name="grsss"]').val(gross)

                                                                    var amount_received = $('#amount_received').val();
                                                                    var change = amount_received - gross;
                                                                    $('#editPaymentForm').find('[name="change"]').val(change).end()


                                                                });
                                                            });
                                                            var sub_total = $(this).data('id') * $('#idinput-' + idd).val();
                                                            tot = tot + sub_total;


                                                        });

                                                        var discount = $('#dis_id').val();

<?php
if ($discount_type == 'flat') {
    ?>

                                                            var gross = tot - discount;

<?php } else { ?>

                                                            var gross = tot - tot * discount / 100;

<?php } ?>

                                                        $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()

                                                        $('#editPaymentForm').find('[name="grsss"]').val(gross)

                                                        var amount_received = $('#amount_received').val();
                                                        var change = amount_received - gross;
                                                        $('#editPaymentForm').find('[name="change"]').val(change).end()

                                                    }

                                                    );




                                                    $(document).ready(function () {
                                                        $('#dis_id').keyup(function () {
                                                            var val_dis = 0;
                                                            var amount = 0;
                                                            var ggggg = 0;
                                                            amount = $('#subtotal').val();
                                                            val_dis = this.value;
<?php
if ($discount_type == 'flat') {
    ?>
                                                                ggggg = amount - val_dis;
<?php } else { ?>
                                                                ggggg = amount - amount * val_dis / 100;
<?php } ?>
                                                            $('#editPaymentForm').find('[name="grsss"]').val(ggggg)


                                                            var amount_received = $('#amount_received').val();
                                                            var change = amount_received - ggggg;
                                                            $('#editPaymentForm').find('[name="change"]').val(change).end()

                                                        });
                                                    });



</script> 

<script>
    $(document).ready(function () {

        $('.multi-select').change(function () {
            var tot = 0;
            //  $(".qfloww").html("");
            $(".ms-selected").click(function () {
                var idd = $(this).data('idd');
                $('#id-div' + idd).remove();
                $('#idinput-' + idd).remove();
                $('#categoryinput-' + idd).remove();

            });
            $.each($('select.multi-select option:selected'), function () {
                var curr_val = $(this).data('id');
                var idd = $(this).data('idd');
                //  tot = tot + curr_val;
                var cat_name = $(this).data('cat_name');
                if ($('#idinput-' + idd).length)
                {

                } else {
                    if ($('#id-div' + idd).length)
                    {

                    } else {
                        $("#editPaymentForm .qfloww").append('<div class="remove1" id="id-div' + idd + '">  ' + $(this).data("cat_name") + '- <?php echo $settings->currency; ?> ' + $(this).data('id') + '</div>')
                    }


                    var input2 = $('<input>').attr({
                        type: 'text',
                        class: "remove",
                        id: 'idinput-' + idd,
                        name: 'quantity[]',
                        value: '1',
                    }).appendTo('#editPaymentForm .qfloww');

                    $('<input>').attr({
                        type: 'hidden',
                        class: "remove",
                        id: 'categoryinput-' + idd,
                        name: 'category_id[]',
                        value: idd,
                    }).appendTo('#editPaymentForm .qfloww');
                }


                $(document).ready(function () {
                    $('#idinput-' + idd).keyup(function () {
                        var qty = 0;
                        var total = 0;
                        $.each($('select.multi-select option:selected'), function () {
                            var id1 = $(this).data('idd');
                            qty = $('#idinput-' + id1).val();
                            var ekokk = $(this).data('id');
                            total = total + qty * ekokk;
                        });

                        tot = total;

                        var discount = $('#dis_id').val();
                        var gross = tot - discount;
                        $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()
                        $('#editPaymentForm').find('[name="grsss"]').val(gross)

                        var amount_received = $('#amount_received').val();
                        var change = amount_received - gross;
                        $('#editPaymentForm').find('[name="change"]').val(change).end()


                    });
                });
                var sub_total = $(this).data('id') * $('#idinput-' + idd).val();
                tot = tot + sub_total;


            });

            var discount = $('#dis_id').val();

<?php
if ($discount_type == 'flat') {
    ?>

                var gross = tot - discount;

<?php } else { ?>

                var gross = tot - tot * discount / 100;

<?php } ?>

            $('#editPaymentForm').find('[name="subtotal"]').val(tot).end()

            $('#editPaymentForm').find('[name="grsss"]').val(gross)

            var amount_received = $('#amount_received').val();
            var change = amount_received - gross;
            $('#editPaymentForm').find('[name="change"]').val(change).end()


        }

        );
    });

    $(document).ready(function () {
        $('#dis_id').keyup(function () {
            var val_dis = 0;
            var amount = 0;
            var ggggg = 0;
            amount = $('#subtotal').val();
            val_dis = this.value;
<?php
if ($discount_type == 'flat') {
    ?>
                ggggg = amount - val_dis;
<?php } else { ?>
                ggggg = amount - amount * val_dis / 100;
<?php } ?>
            $('#editPaymentForm').find('[name="grsss"]').val(ggggg)


            var amount_received = $('#amount_received').val();
            var change = amount_received - ggggg;
            $('#editPaymentForm').find('[name="change"]').val(change).end()





        });
    });

</script> 






<!-- Add Patient Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Patient Registration</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="patient/addNew?redirect=payment" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->



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
        $('.pos_doctor').hide();
        $(document.body).on('change', '#add_doctor', function () {

            var v = $("select.add_doctor option:selected").val()
            if (v == 'add_new') {
                $('.pos_doctor').show();
            } else {
                $('.pos_doctor').hide();
            }
        });

    });


</script>

<script>
    $(document).ready(function () {
        $('.card').hide();
        $(document.body).on('change', '#selecttype', function () {

            var v = $("select.selecttype option:selected").val()
            if (v == 'Card') {
                $('.cardsubmit').removeClass('hidden');
                $('.cashsubmit').addClass('hidden');
                $("#amount_received").prop('required', true);
                // $('#amount_received').attr("required");;
                $('.card').show();
            } else {
                $('.card').hide();
                $('.cashsubmit').removeClass('hidden');
                $('.cardsubmit').addClass('hidden');
                $("#amount_received").prop('required', false);
                //$('#amount_received').removeAttr('required');
            }
        });

    });


</script>
<script>
    function cardValidation() {
        var valid = true;
        var cardNumber = $('#card').val();
        var expire = $('#expire').val();
        var cvc = $('#cvv').val();

        $("#error-message").html("").hide();

        if (cardNumber.trim() == "") {
            valid = false;
        }

        if (expire.trim() == "") {
            valid = false;
        }
        if (cvc.trim() == "") {
            valid = false;
        }

        if (valid == false) {
            $("#error-message").html("All Fields are required").show();
        }

        return valid;
    }
//set your publishable key
    Stripe.setPublishableKey("<?php echo $gateway->publish; ?>");

//callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $("#submit-btn").show();
            $("#loader").css("display", "none");
            //display the errors on the form
            $("#error-message").html(response.error.message).show();
        } else {
            //get token id
            var token = response['id'];
            //insert the token into the form
            $('#token').val(token);
            $("#editPaymentForm").append("<input type='hidden' name='token' value='" + token + "' />");
            //submit form to the server
            $("#editPaymentForm").submit();
        }
    }

    function stripePay(e) {
        e.preventDefault();
        var valid = cardValidation();

        if (valid == true) {
            $("#submit-btn").attr("disabled", true);
            $("#loader").css("display", "inline-block");
            var expire = $('#expire').val()
            var arr = expire.split('/');
            Stripe.createToken({
                number: $('#card').val(),
                cvc: $('#cvv').val(),
                exp_month: arr[0],
                exp_year: arr[1]
            }, stripeResponseHandler);

            //submit from callback
            return false;
        }
    }

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

        $("#add_doctor").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorWithAddNewOption',
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

<script src="common/js/moment.min.js"></script>

<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
<?php if ($settings->payment_gateway == '2Checkout') { ?> 
    <script>

    //   $(document).ready(function () {
    // Called when token created successfully.
    var successCallback = function (data) {
        var myForm = document.getElementById('editPaymentForm');
        // Set the token as the value for the token input
        // alert(data.response.token.token);
        $("#editPaymentForm").append("<input type='hidden' name='token' value='" + data.response.token.token + "' />");
        //    myForm.token.value = data.response.token.token;
        // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
        myForm.submit();
    };
    // Called when token creation fails.
    var errorCallback = function (data) {
        if (data.errorCode === 200) {
            tokenRequest();
        } else {
            alert(data.errorMsg);
        }
    };
    var tokenRequest = function () {
    <?php $twocheckout = $this->db->get_where('paymentGateway', array('name =' => '2Checkout'))->row(); ?>
        // Setup token request arguments  
        var expire = $("#expire").val();
        var expiresep = expire.split("/");
        var dateformat = moment(expiresep[1], "YY");
        var year = dateformat.format("YYYY");
        var args = {
            sellerId: "<?php echo $twocheckout->merchantcode; ?>",
            publishableKey: "<?php echo $twocheckout->publishablekey; ?>",
            ccNo: $("#card").val(),
            cvv: $("#cvv").val(),
            expMonth: expiresep[0],
            expYear: year
        };
console.log($("#card").val() +'-'+$("#cvv").val() +expiresep[0] + year +"<?php echo $twocheckout->merchantcode; ?>");
        // Make the token request

        TCO.requestToken(successCallback, errorCallback, args);
    };
    //   });
    function twoCheckoutPay(e) {
        e.preventDefault();

        // try {
        // Pull in the public encryption key for our environment
       // TCO.loadPubKey('production');
        TCO.loadPubKey('sandbox', function () {  // for sandbox environment
            publishableKey = "<?php echo $twocheckout->publishablekey; ?>"//your public key
              tokenRequest();
        });
        //  $("#editPaymentForm").submit(function (e) {
        // Call our token request function

      
        // Prevent form from submitting
        return false;
        // });
        // } catch (e) {
        //     alert(e.toSource());
        //  }
    }
    // Pull in the public encryption key for our environment

    //});
    </script>
<?php } ?>

