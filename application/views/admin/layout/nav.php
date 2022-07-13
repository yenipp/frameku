        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <!-- MENU DASHBOARD -->
                    <!-- <li class="nav-label">Dashboard</li> -->
                    <br>
                    <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i>DASHBOARD</a></li>

                    <!-- MENU PRODUK -->
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">PRODUK</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i>Data Frame</a></li>
                            <!-- <li><a href="<?php echo base_url('admin/produk/tambah') ?>"><i class="fa fa-plus"></i>Tambah Produk</a></li> -->
                            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i>Kategori Produk</a></li>
                        </ul>
                    </li>
                    <!-- AKHIR MENU PRODUK -->

                    <!-- MENU BERITA -->
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">BERITA</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('admin/berita') ?>"><i class="fa fa-table"></i>Data BERITA</a></li>
                        </ul>
                    </li>
                    <!-- AKHIR MENU BERITA -->

                    <!-- MENU PELANGGAN -->
                    <!-- <li><a href="<?php echo base_url('admin/pelanggan') ?>"><i class="fa fa-user"></i>PELANGGAN</a></li> -->
                    <!-- AKHIR MENU PELANGGAN -->

                    <!-- MENU PELANGGAN -->
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-users"></i><span class="nav-text">PELANGGAN</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('admin/pelanggan') ?>"><i class="fa fa-table"></i>Data PELANGGAN</a></li>
                        </ul>
                    </li>
                    <!-- AKHIR MENU PELANGGAN -->

                    <!-- MENU USER/PENGGUNA -->
                    <?php if ($this->session->userdata('akses_level') !== "Admin") { ?>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-lock"></i><span class="nav-text">ADMIN</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i>Data ADMIN</a></li>
                                <!-- <li><a href="<?php echo base_url('admin/user/tambah') ?>"><i class="fa fa-plus"></i>Tambah ADMIN</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>

                    <!-- AKHIR MENU USER/PENGGUNA -->

                    <!-- MENU DETAIL PROFIL PENGGUNA -->
                    <!-- <li><a href="<?php echo base_url('admin/user/detail_pengguna') ?>"><i class="fa fa-user"></i>UBAH PASWWORD</a></li> -->
                    <!-- AKHIR MENU DETAIL PROFIL PENGGUNA -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->