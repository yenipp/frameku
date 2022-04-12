<?php
//Loading konfigurasi website
$site   = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->

    <!-- ICON DIAMBIL DARI KONFIGURASI WEBSITE -->
    <!-- <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/templat/images/icons/favicon.png" /> -->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/' . $site->icon) ?>" />

    <!-- SEO Google -->
    <meta name="keyword" content="<?php echo $site->keyword ?>">
    <meta name="deskripsi" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/templat/images/icons/favicon.png" />

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/templat/css/main.css">
    <!--===============================================================================================-->
    <style type="text/css" media="screen">
        ul.pagination {
            padding: 0 10px;
            background-color: grey;
            border-radius: 10px;
        }

        .pagination a,
        .pagination b {
            padding: 10px 20px;
            text-decoration: none;
            float: left;
        }

        .pagination a {
            background-color: grey;
            color: white;
        }

        .pagination b {
            background-color: black;
            color: white;
        }

        .pagination a:hover {
            background-color: black;
        }
    </style>


</head>

<body class="animsition">