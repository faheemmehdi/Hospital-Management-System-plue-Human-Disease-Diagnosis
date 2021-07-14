<!--sidebar end-->
<!--main content start-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<section id="main-content"> 
    <section class="wrapper site-min-height">
        <!--state overview start-->
        <div class="col-md-12">
            <div class="row state-overview" style="padding: 23px 0px;">
                <div class="col-md-8">
                    <!--custom chart start-->

                    <?php
                    $currently_processing_year = date('Y', $first_minute);
                    $next_year = $currently_processing_year + 1;
                    $previous_year = $currently_processing_year - 1;
                    ?>

                    <div class="panel-heading"> <?php echo date('Y', $first_minute) . ' ' .lang('pharmacy').' '. lang('expense_report'); ?> 
                        
                        <div class="col-md-1 pull-right no-print">
                            <a class="no-print pull-right" onclick="javascript:window.print();"> <i class="fa fa-print"></i>  </a>
                        </div>
                        <div class="col-md-1 pull-right no-print">
                            <a href="finance/pharmacy/monthlyExpense?year=<?php echo $next_year; ?>">
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="col-md-1 pull-right no-print">
                            <a href="finance/pharmacy/monthlyExpense?year=<?php echo $previous_year; ?>">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <div  id="chart_div"></div>




                    <div class="panel-body">
                        <div class="adv-table editable-table ">

                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample1">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('date'); ?> </th>
                                        <th> <?php echo lang('amount'); ?> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($month = 1; $month <= 12; $month++) {
                                        $time = mktime(12, 0, 0, $month, 1, $year);
                                        if (!empty($all_expenses[date('m-Y', $time)])) {
                                            if (date('Y', $time) == $year) {
                                                $month_name = date('F', $time);
                                                $amount = $all_expenses[date('m-Y', $time)];
                                            }
                                        } else {
                                            if (date('Y', $time) == $year) {
                                                $month_name = date('F', $time);
                                                $amount = 0;
                                            }
                                        }
                                        ?>
                                    
                                        <tr>
                                            <td><?php echo $month_name; ?></td>
                                            <td><?php echo $this->currency; ?><?php echo number_format($amount, 2, '.', ','); ?></td>
                                            <?php $total_amount[] = $amount; ?>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                        
                                         <?php
                                    if (!empty($total_amount)) {
                                        $total_amount = array_sum($total_amount);
                                    } else {
                                        $total_amount = 0;
                                    }
                                    ?>

                                    <tr style="color: #000 !important; font-weight: bold;">
                                        <td><?php echo lang('total'); ?></td> 
                                        <td><?php echo $this->currency; ?><?php echo number_format($total_amount, 2, '.', ','); ?></td>
                                    </tr>


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
        <!--state overview end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<!--footer end-->
<div id="myModal33" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo lang(stock_alert); ?></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</section>

<!-- js placed at the end of the document so the pages load faster -->

<script src="common/js/codearistos.min.js"></script>
<script>
    $(window).on('load', function () {
        //      $('#myModal33').modal('show');
    });
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var income = '<?php echo lang('expense'); ?>';
        var data = google.visualization.arrayToDataTable([
            ['Month', income],
            ['Jan',<?php echo $jan_total; ?>],
            ['Feb',<?php echo $feb_total; ?>],
            ['Mar', <?php echo $mar_total; ?>],
            ['Apr', <?php echo $apr_total; ?>],
            ['May', <?php echo $may_total; ?>],
            ['June', <?php echo $jun_total; ?>],
            ['July', <?php echo $jul_total; ?>],
            ['Aug', <?php echo $aug_total; ?>],
            ['Sep', <?php echo $sep_total; ?>],
            ['Oct', <?php echo $oct_total; ?>],
            ['Nov', <?php echo $nov_total; ?>],
            ['Dec', <?php echo $dec_total; ?>],
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




</body>
</html>
