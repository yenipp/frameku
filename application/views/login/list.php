<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/admin/assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="h-100">

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





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h3><?php echo $title ?></h3>
                                </a>

                                <!-- <form class="mt-5 mb-5 login-input"> -->
                                <form method="post" action="<?= base_url('login'); ?>">
                                    <h4 class="text-center">Masukkan username dan password</h4>

                                    <?php
                                    // Notifikasi error
                                    echo validation_errors('<div class="alert alert-success">', '</div>');

                                    //Notifikasi gagal login
                                    if ($this->session->flashdata('warning')) {
                                        echo '<div class="alert alert-warning">';
                                        echo $this->session->flashdata('warning');
                                        echo '<div>';
                                    }

                                    //Notifikasi logout
                                    if ($this->session->flashdata('sukses')) {
                                        echo '<div class="alert alert-success">';
                                        echo $this->session->flashdata('sukses');
                                        echo '<div>';
                                    }

                                    //Form open login
                                    echo form_open(base_url('login'), 'class="form-validation"');
                                    ?>


                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi Password">
                                    </div>
                                    <button type="submit" name="submit" class="btn login-form__btn submit w-100">Login</button>

                                    <?php echo form_close(); ?>
                                </form>
                                <!--   <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo base_url() ?>assets/admin/plugins/common/common.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/settings.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/gleek.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/styleSwitcher.js"></script>
</body>

</html>