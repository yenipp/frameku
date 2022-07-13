<?php
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk         = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile  = $this->konfigurasi_model->nav_produk();
?>

<div class="wrap_header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>" class="logo">
        <img src="<?= base_url('assets/upload/image/logohorizontal.jpg') ?>"> Optik Wijaya Kusuma
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <!-- HOME -->
                <li>
                    <a href="<?php echo base_url() ?>">Beranda</a>
                </li>
                <!-- MENU PRODUK -->
                <li>
                    <a href="<?php echo base_url('produk') ?>">Produk &amp; Kategori</a>
                    <ul class="sub_menu">
                        <?php foreach ($nav_produk as $nav_produk) { ?>
                            <li><a href="<?php echo base_url('produk/kategori/' . $nav_produk->slug_kategori) ?>">
                                    <?php echo $nav_produk->nama_kategori ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('home/kontak') ?>">Contact</a>
                </li>
                <li>
                    <!-- <a href="<?php echo base_url('camera') ?>">Coba Frame</a> -->
                    <a href="<?php echo base_url('camera') ?>" target="_blank">Coba Frame</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">

        <?php if ($this->session->userdata('email')) { ?>

            <a href="<?php echo base_url('dasbor/belanja/') ?>" class="header-wrapicon1 dis-block">
                <img src="<?php echo base_url('assets/upload/image/iconuser.png') ?>" class="header-icon1" alt="ICON">
                <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp; &nbsp;
            </a>

            <!-- <a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
                <img src="<?php echo base_url('assets/upload/image/iconlogout.png') ?>" class="header-icon1" alt="ICON">
                Logout
            </a> -->

        <?php } else { ?>

            <a href="<?php echo base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
                <img src="<?php echo base_url() ?>assets/templat/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            </a>

        <?php } ?>

        <span class="linedivide1"></span>


    </div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
    <!-- Logo moblie -->
    <a href="<?php echo base_url() ?>" class="logo-mobile">
        <img src="<?= base_url('assets/upload/image/mata.png') ?>"> Optik Wijaya Kusuma
    </a>

    <!-- Button show menu -->
    <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
            <?php if ($this->session->userdata('email')) { ?>

                <a href="<?php echo base_url('dasbor') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url('assets/upload/image/iconuser.png') ?>" class="header-icon1" alt="ICON">
                    <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp; &nbsp;
                </a>

                <!-- <a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url('assets/upload/image/iconlogout.png') ?>" class="header-icon1" alt="ICON">
                    Logout
                </a> -->

            <?php } else { ?>

                <a href="<?php echo base_url('registrasi') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?php echo base_url() ?>assets/templat/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

            <?php } ?>

            <span class="linedivide2"></span>

            <div class="header-wrapicon2">
                <?php
                //Check data belanjaan ada atau tidak
                $keranjang_mobile      = $this->cart->contents();
                ?>
                <!-- <img src="<?php echo base_url('assets/upload/image/iconwishlist.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON"> -->
                <!-- <span class="header-icons-noti"><?php echo count($keranjang_mobile) ?></span> -->

                <!-- Header cart noti -->
                <div class="header-cart header-dropdown">
                    <ul class="header-cart-wrapitem">

                        <?php
                        //Kalau ga ada data belanjaan
                        if (empty($keranjang_mobile)) {
                        ?>
                            <li class="header-cart-item">
                                <p class="alert alert-success">Tidak ada produk favorit</p>
                            </li>
                            <?php
                            //Kalau ada 
                        } else {
                            //Total belanjaan
                            $total_belanja = 'Rp. ' . number_format($this->cart->total(), '0', ',', '.');
                            //Tampilkan data belanjaan
                            foreach ($keranjang_mobile as $keranjang_mobile) {
                                $id_produk_mobile    = $keranjang_mobile['id'];
                                $produk_mobile       = $this->produk_model->detail($id_produk_mobile);
                            ?>

                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="<?php echo base_url('assets/upload/frame/' . $produk_mobile->gambar_produk) ?>" alt="<?php echo $keranjang_mobile['name'] ?>">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            <?php echo $keranjang_mobile['name'] ?>
                                        </a>

                                        <a class="header-cart-item-info">
                                            <?php echo number_format($keranjang_mobile['price'], '0', ',', '.') ?>
                                        </a>
                                    </div>
                                </li>

                        <?php } //Closing foreach
                        } //Closing if 
                        ?>
                    </ul>

                    <!-- <div class="header-cart-total">
                        Total: <?php if (!empty($keranjang)) {
                                    echo $total_belanja;
                                } ?>
                    </div> -->

                    <div class="header-cart-buttons">
                        <!-- <div class="header-cart-wrapbtn"> -->
                        <!-- Button -->
                        <a href="<?php echo base_url('belanja') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Lihat daftar favorit
                        </a>
                        <!-- </div> -->

                        <!-- <div class="header-cart-wrapbtn">
                            Button
                            <a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Check Out
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu">
    <nav class="side-menu">
        <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <span class="topbar-child1">
                    Jl. Raya Kasianto, Goranggareng, Kawedanan, Magetan
                </span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                <div class="topbar-child2-mobile">
                    <span class="topbar-email">
                        optikwijaya@gmail.com
                    </span>
                    <span class="topbar-email">
                        085779842345
                    </span>

                    <!-- <div class="topbar-language rs1-select2">
                        <select class="selection-1" name="time">
                            <option>085779842345</option>
                            <option>optikwijaya@gmail.com</option>
                        </select>
                    </div> -->
                </div>
            </li>

            <!-- <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="" class="topbar-social-item fa fa-facebook"></a>
                    <a href="" class="topbar-social-item fa fa-instagram"></a>
                </div>
            </li> -->

            <!-- Menu MOBILE HOMEPAGE -->
            <li class="item-menu-mobile">
                <a href="<?php echo base_url() ?>">Beranda</a>
            </li>

            <!-- Menu MOBILE PRODUK -->
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('produk') ?>">Produk &amp; Kategori</a>
                <ul class="sub-menu">
                    <?php foreach ($nav_produk_mobile as $nav_produk_mobile) { ?>
                        <li><a href="<?php echo base_url('produk/kategori/' . $nav_produk->slug_kategori) ?>">
                                <?php echo $nav_produk_mobile->nama_kategori ?>
                            </a></li>
                    <?php } ?>
                </ul>
                <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
            </li>
            <!-- Menu KONTAK MOBILE-->
            <li class="item-menu-mobile">
                <a href="<?php echo base_url('kontak') ?>">Contact</a>
            </li>
            <!-- Menu Coba Frame MOBILE -->
            <li class="item-menu-mobile">
                <!-- <a href="<?php echo base_url('camera') ?>">Coba Frame</a> -->
                <a href="<?php echo base_url('camera') ?>" target="_blank">Coba Frame</a>
            </li>
        </ul>
    </nav>
</div>
</header>