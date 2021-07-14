<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Rizvi">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">
        <title>Reset Password - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>
        <!-- Bootstrap core CSS -->
        <link href="common/css/bootstrap.min.css" rel="stylesheet">
        <link href="common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="common/css/style.css" rel="stylesheet">
        <link href="common/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-body">
        <div class="container">
            <style>
                form{
                    padding: 0px;
                    border: none;
                }
                .center{
                    text-align: center;
                    margin-top: 10px;
                }
            </style>
            <div class="form-signin">
                <div class="center">
                    <h3><?php echo lang('reset_password_heading'); ?></h3>
                </div>
                <div id="infoMessage"><?php echo $message; ?></div>
                <?php echo form_open('auth/reset_password/' . $code); ?>
                <div class="login-wrap">
                    <p>
                        <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?></label> <br />
                        <?php echo form_input($new_password); ?>
                    </p>
                    <p>
                        <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                        <?php echo form_input($new_password_confirm); ?>
                    </p>
                </div>
                <?php echo form_input($user_id); ?>
                <?php echo form_hidden($csrf); ?>
                <p><?php echo form_submit('submit', lang('reset_password_submit_btn')); ?></p>
                <?php echo form_close(); ?>
            </div>
            <style>
                table, th, td {
                    border: 1px solid #f1f2f7;
                    border-collapse: collapse;
                }
                th, td {
                    padding: 5px;
                    text-align: left;
                    font-size:12px;
                }
                td,th,h4{
                    color:#aaa;

                }
            </style>
        </div>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="common/js/jquery.js"></script>
        <script src="common/js/bootstrap.min.js"></script>
    </body>
</html>
