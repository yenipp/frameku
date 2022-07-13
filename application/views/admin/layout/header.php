<!--**********************************
           Nav Header start
        ***********************************-->
<div>
    <div class="nav-header">
        <div>
            <center><img src="<?php echo base_url() ?>assets/upload/image/logohorizontal10.png" height="80" weight="100"></center>
            <!-- <a href="<?php echo base_url('admin/dasbor') ?>"> -->
            <!-- <b class="logo-abbr"><img src="<?php echo base_url() ?>assets/upload/image/logohorizontal.jpg" height="80" weight="100"> </b> -->
            <!-- <span class="logo-compact"><img src="<?php echo base_url() ?>assets/admin/./images/logo-compact.png" alt=""></span> -->
            <!-- <span class="brand-title"> -->
            <!-- <img src="<?php echo base_url() ?>assets/upload/image/logohorizontal.jpg" height="80" weight="100"> -->
            <!-- </span> -->
            <!-- </a> -->
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content clearfix">
            <br>

            <!-- <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div> -->
            <div class="header-left">
                <div class="input-group icons">
                    <!-- <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                </div> -->
                    <!-- <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down   d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div> -->
                </div>
            </div>
            <!-- <br> -->
            <div class="header-right">
                <ul class="clearfix">
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <span class="hidden-xs"><?php echo $this->session->userdata('nama_pengguna'); ?> | <?php echo $this->session->userdata('akses_level'); ?></span>
                            <img src="<?php echo base_url() ?>assets/upload/image/iconadmin.jpg" height="40" width="40" alt="">
                            <!-- <img src="<?php echo base_url() ?>assets/admin/images/user/3.png" height="40" width="40" alt=""> -->

                        </div>
                        <div class="drop-down dropdown-profile   dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <!-- <span class="hidden-xs"><?php echo $this->session->userdata('nama_pengguna'); ?> | <?php echo $this->session->userdata('akses_level'); ?></span> -->
                                        <a href="<?php echo base_url('admin/user/detail_pengguna') ?>"><i class="icon-user"></i> <span><?php echo $this->session->userdata('nama_pengguna'); ?> - <?php echo $this->session->userdata('akses_level'); ?>
                                            </span></a>
                                    </li>
                                    <!-- <li>
                                    <a href="email-inbox.html"><i class="icon-envelope-open"></i> <span>Inbox</span>
                                        <div class="badge gradient-3 badge-pill badge-primary">3</div>
                                    </a>
                                </li> -->

                                    <hr class="my-2">
                                    <li>
                                        <a href="<?php echo base_url('admin/user/detail_pengguna') ?>"><i class="icon-lock"></i> <span>Ubah Password</span></a>
                                    </li>
                                    <li><a href="<?php echo base_url('login/logout') ?>" onclick="return confirm('Yakin logout?');"><i class="icon-key"></i><span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>