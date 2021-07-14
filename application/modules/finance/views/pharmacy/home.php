<!--sidebar end-->
<!--main content start-->
<script type="text/javascript" src="common/js/google-loader.js"></script>
<section id="main-content"> 

    <section class="wrapper site-min-height">           
        <style>         
            .panel-heading{
                margin-bottom: 20px;
            }             
            .state-overview .value h1 {
                font-weight: bold;
                font-size: 18px;
                margin-top: 5px;
            }
        </style>


        <!--state overview start-->
        <div class="col-md-12">
            <header class="panel-heading">
                <i class="fa fa-home"></i>  <?php echo lang('pharmacy'); ?> <?php echo lang('dashboard'); ?>
            </header>
            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <a href="finance/pharmacy/todaySales">
                        <?php } ?>
                        <section class="panel panel-moree">
                            <div class="symbol terques">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="value">
                                <p> <?php echo lang('today_sales'); ?> </p>
                                <h1 class="">
                                    <?php echo $settings->currency; ?> <?php echo number_format($today_sales_amount, 2, '.', ','); ?>
                                </h1>
                            </div>
                        </section>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                        </a>
                    <?php } ?>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <a href="finance/pharmacy/todayExpense">
                        <?php } ?>
                        <section class="panel panel-moree">
                            <div class="symbol blue">
                                <i class="fa fa-minus"></i>
                            </div>
                            <div class="value">
                                <p> <?php echo lang('today_expense'); ?> </p>
                                <h1 class="">
                                    <?php echo $settings->currency; ?> <?php echo number_format($today_expenses_amount, 2, '.', ','); ?>
                                </h1>

                            </div>
                        </section>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                        </a>
                    <?php } ?>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <a href="medicine">
                        <?php } ?>
                        <section class="panel panel-moree">
                            <div class="symbol blue">
                                <i class="fa fa-medkit"></i>
                            </div>
                            <div class="value">
                                <p> <?php echo lang('medicine'); ?> </p>
                                <h1 class="">
                                    <?php echo $this->db->count_all('medicine'); ?>
                                </h1>

                            </div>
                        </section>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                        </a>
                    <?php } ?>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <a href="accountant">
                        <?php } ?>
                        <section class="panel panel-moree">
                            <div class="symbol blue">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="value">
                                <p> <?php echo lang('staff'); ?> </p>
                                <h1 class="">
                                    <?php echo $this->db->count_all('accountant'); ?>
                                </h1>
                            </div>
                        </section>
                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                        </a>
                    <?php } ?>
                </div>





                <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>

                    <div class="col-lg-6 col-sm-12">
                        <div id="chart_div" class="panel" style=""></div>
                        <div class="panel">         
                            <div class="panel-heading"> <?php echo lang('latest_sales'); ?></div>
                            <table class="table table-striped table-hover table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('date'); ?> </th>
                                        <th> <?php echo lang('grand_total'); ?> </th>
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
                                    .option_th{
                                        width:18%;
                                    }

                                </style>
                                <?php
                                $i = 0;
                                foreach ($payments as $payment) {
                                    $i = $i + 1;
                                    ?>
                                    <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                                    <tr class="">
                                        <td><?php echo date('d/m/y', $payment->date); ?></td>
                                        <td><?php echo $settings->currency; ?> <?php echo number_format($payment->gross_total, 2, '.', ','); ?></td>
                                    </tr>
                                    <?php
                                    if ($i == 10)
                                        break;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="panel">         
                            <div class="panel-heading"> <?php echo lang('latest_expense'); ?></div>
                            <table class="table table-striped table-hover table-bordered" id="">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('category'); ?> </th>
                                        <th> <?php echo lang('date'); ?> </th>
                                        <th> <?php echo lang('amount'); ?> </th>
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
                                $i = 0;
                                foreach ($expenses as $expense) {
                                    $i = $i + 1;
                                    ?>
                                    <tr class="">
                                        <td><?php echo $expense->category; ?></td>
                                        <td> <?php echo date('d/m/y', $expense->date); ?></td>
                                        <td><?php echo $settings->currency; ?> <?php echo number_format($expense->amount, 2, '.', ','); ?></td>             
                                    </tr>
                                    <?php
                                    if ($i == 10)
                                        break;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>




                    </div>

                <?php } ?>




                <div class="col-md-6">
                    <!--work progress start-->
                    <section class="panel" style="padding-top: 10px;">
                        <div class="panel-body progress-panel">
                            <div class="task-progress">
                                <h1><?php echo lang('statistics'); ?></h1>
                                <p><?php echo lang('this_month'); ?></p>
                            </div>
                        </div>
                        <table class="table table-hover personal-task">
                            <tbody>  
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <?php echo lang('number_of_sales'); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-important">
                                            <?php
                                            $query_n_o_s = $this->db->get('pharmacy_payment')->result();
                                            $i = 0;
                                            foreach ($query_n_o_s as $q_n_o_s) {
                                                if (date('m/y', time()) == date('m/y', $q_n_o_s->date)) {
                                                    $i = $i + 1;
                                                }
                                            }
                                            echo $i;
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress1"><canvas width="47" height="20" style="display: inline-block; width: 47px; height: 20px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>
                                        <?php echo lang('total_sales'); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-important">
                                            <?php echo $settings->currency; ?>
                                            <?php
                                            $query = $this->db->get('pharmacy_payment')->result();
                                            $sales_total = array();
                                            foreach ($query as $q) {
                                                if (date('m', time()) == date('m', $q->date)) {
                                                    $sales_total[] = $q->gross_total;
                                                }
                                            }
                                            if (!empty($sales_total)) {
                                                echo number_format(array_sum($sales_total), 2, '.', ',');
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress1"><canvas width="47" height="20" style="display: inline-block; width: 47px; height: 20px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>
                                        <?php echo lang('number_of_expenses'); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <?php
                                            $query_n_o_e = $this->db->get('pharmacy_expense')->result();
                                            $i = 0;
                                            foreach ($query_n_o_e as $q_n_o_e) {
                                                if (date('m', time()) == date('m', $q_n_o_e->date)) {
                                                    $i = $i + 1;
                                                }
                                            }
                                            echo $i;
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress2"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>4</td>
                                    <td>
                                        <?php echo lang('total_expense'); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <?php echo $settings->currency; ?>
                                            <?php
                                            $query_expense = $this->db->get('pharmacy_expense')->result();
                                            $sales_total = array();
                                            foreach ($query_expense as $q_expense) {
                                                if (date('m', time()) == date('m', $q_expense->date)) {
                                                    $expense_total[] = $q_expense->amount;
                                                }
                                            }
                                            if (!empty($expense_total)) {
                                                echo number_format(array_sum($expense_total), 2, '.', ',');
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress2"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>
                                        <?php echo lang('medicine_number'); ?> 
                                    </td>
                                    <td>
                                        <span class="badge bg-info"> 
                                            <?php
                                            $query_medicine_number = $this->db->get('medicine')->result();
                                            $i = 0;
                                            foreach ($query_medicine_number as $q_medicine_number) {
                                                $i = $i + 1;
                                            }
                                            echo $i;
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress3"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>
                                        <?php echo lang('medicine_quantity'); ?> 
                                    </td>
                                    <td>
                                        <span class="badge bg-info"> 
                                            <?php
                                            $query_medicine = $this->db->get('medicine')->result();
                                            $i = 0;
                                            foreach ($query_medicine as $q_medicine) {
                                                if ($q_medicine->quantity > 0) {
                                                    $i = $i + $q_medicine->quantity;
                                                }
                                            }
                                            echo number_format($i, 2, '.', ',');
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress3"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>
                                        <?php echo lang('medicine_o_s'); ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">
                                            <?php
                                            $query_medicine = $this->db->get('medicine')->result();
                                            $i = 0;
                                            foreach ($query_medicine as $q_medicine) {
                                                if ($q_medicine->quantity == 0) {
                                                    $i = $i + 1;
                                                }
                                            }
                                            echo $i;
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div id="work-progress4"><canvas width="47" height="22" style="display: inline-block; width: 47px; height: 22px; vertical-align: top;"></canvas></div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </section>
                    <!--work progress end-->


                    <div class="panel">  
                        <div class="panel-heading"> <?php echo lang('latest_medicines'); ?></div>
                        <table class="table table-striped table-hover table-bordered" id="">
                            <thead>
                                <tr>
                                    <th> <?php echo lang('name'); ?></th>
                                    <th> <?php echo lang('category'); ?></th>
                                    <th> <?php echo lang('price'); ?></th>
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

                                .load{
                                    float: right !important;
                                }

                            </style>
                            <?php
                            $i = 0;
                            foreach ($latest_medicines as $latest_medicine) {
                                $i = $i + 1;
                                ?>
                                <tr class="">
                                    <td><?php echo $latest_medicine->name; ?></td>
                                    <td> <?php echo $latest_medicine->category; ?></td>
                                    <td><?php echo $settings->currency; ?> <?php echo number_format($latest_medicine->s_price, 2, '.', ','); ?></td>
                                </tr>
                                <?php
                                if ($i == 10)
                                    break;
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>



                </div>










            </div>


        </div>
        <!--state overview end-->
    </section>
</section>
<!--main content end-->



<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Income', 'Expense'],
            ['Jan', <?php echo $this_year['payment_per_month']['january']; ?>, <?php echo $this_year['expense_per_month']['january']; ?>],
            ['Feb', <?php echo $this_year['payment_per_month']['february']; ?>, <?php echo $this_year['expense_per_month']['february']; ?>],
            ['Mar', <?php echo $this_year['payment_per_month']['march']; ?>, <?php echo $this_year['expense_per_month']['march']; ?>],
            ['Apr', <?php echo $this_year['payment_per_month']['april']; ?>, <?php echo $this_year['expense_per_month']['april']; ?>],
            ['May', <?php echo $this_year['payment_per_month']['may']; ?>, <?php echo $this_year['expense_per_month']['may']; ?>],
            ['June', <?php echo $this_year['payment_per_month']['june']; ?>, <?php echo $this_year['expense_per_month']['june']; ?>],
            ['July', <?php echo $this_year['payment_per_month']['july']; ?>, <?php echo $this_year['expense_per_month']['july']; ?>],
            ['Aug', <?php echo $this_year['payment_per_month']['august']; ?>, <?php echo $this_year['expense_per_month']['august']; ?>],
            ['Sep', <?php echo $this_year['payment_per_month']['september']; ?>, <?php echo $this_year['expense_per_month']['september']; ?>],
            ['Oct', <?php echo $this_year['payment_per_month']['october']; ?>, <?php echo $this_year['expense_per_month']['october']; ?>],
            ['Nov', <?php echo $this_year['payment_per_month']['november']; ?>, <?php echo $this_year['expense_per_month']['november']; ?>],
            ['Dec', <?php echo $this_year['payment_per_month']['december']; ?>, <?php echo $this_year['expense_per_month']['december']; ?>],
        ]);

        var options = {
            title: new Date().getFullYear() + ' <?php echo lang('per_month_income_expense'); ?>',
            vAxis: {title: '<?php echo $settings->currency; ?>'},
            hAxis: {title: '<?php echo lang('months'); ?>'},
            seriesType: 'bars',
            series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
