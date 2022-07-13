<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/admin/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url() ?>assets/admin/./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet">

    <!-- ckeditor -->
    <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/ckeditor/samples/js/sample.js" type="text/javascript"></script>

    <style type="text/css" media="screen">
        /* overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, .1);

        }

        .overlay:target {
            bottom: 0;
            right: 0;
        }
    </style>


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">