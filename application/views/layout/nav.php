<?php
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk         = $this->konfigurasi_model->nav_produk();
$nav_produk_mobile  = $this->konfigurasi_model->nav_produk();
?>

<div class="wrap-menu-desktop">
    <nav class="limiter-menu-desktop container">

        <!-- Logo desktop -->
        <a href="#" class="logo">
            <img src="<?php echo base_url('assets/upload/image/' . $site->logo) ?>" alt="<?php echo $site->nama_web ?> | <?php echo $site->tagline ?>">
        </a>

        <!-- Menu desktop -->
        <div class="menu-desktop">
            <ul class="main-menu">
                <li class="active-menu">
                    <!-- HOME -->
                <li>
                    <a href="<?php echo base_url() ?>">Beranda</a>
                </li>

                <!-- MENU PRODUK -->

                <li>
                    <a href="<?php echo base_url('produk') ?>">Produk &amp; Belanja</a>
                    <ul class="sub-menu">
                        <?php foreach ($nav_produk as $nav_produk) { ?>
                            <li><a href="<?php echo base_url('produk/kategori/' . $nav_produk->sub_kategori) ?>">
                                    <?php echo $nav_produk->nama_kategori ?>
                                </a></li>
                        <?php } ?>
                    </ul>
                </li>
                </li>

                <li>
                    <a href="product.html">Shop</a>
                </li>

                <li class="label1" data-label1="hot">
                    <a href="shoping-cart.html">Features</a>
                </li>

                <li>
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="<?php echo base_url('kontak') ?>">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>
    </nav>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
        <a href="index.html"><img src="<?php echo base_url() ?>assets/templat/images/icons/logo-01.png" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
            <i class="zmdi zmdi-shopping-cart"></i>
        </div>

        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
            <i class="zmdi zmdi-favorite-outline"></i>
        </a>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">
    <ul class="topbar-mobile">
        <li>
            <div class="left-top-bar">
                <a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
                <a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
            </div>
        </li>

        <li>
            <div class="right-top-bar flex-w h-full">
                <a href="#" class="flex-c-m p-lr-10 trans-04">
                    <?php echo $site->alamat ?>
                </a>

                <a href="#" class="flex-c-m p-lr-10 trans-04">
                    <?php echo $site->email ?>
                </a>

                <a href="#" class="flex-c-m p-lr-10 trans-04">
                    <?php echo $site->telepon ?>
                </a>

                <!-- <a href="#" class="flex-c-m p-lr-10 trans-04">
                    USD
                </a> -->
            </div>
        </li>
    </ul>

    <!-- menu mobile homepage -->
    <ul class="main-menu-m">
        <li>
            <a href="<?php echo base_url() ?>">Beranda</a>
        </li>

        <!-- menu mobile produk -->
        <li>
            <a href="<?php base_url('produk') ?>">Produk &amp; Belanja</a>
            <ul class="sub-menu-m">
                <?php foreach ($nav_produk_mobile as $nav_produk_mobile) { ?>
                    <li><a href="<?php echo base_url('produk/kategori/' . $nav_produk_mobile->sub_kategori) ?>">
                            <?php echo $nav_produk_mobile->nama_kategori ?>
                        </a></li>
                <?php } ?>
            </ul>
            <span class="arrow-main-menu-m">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
        </li>

        <!-- <li>
            <a href="product.html">Shop</a>
        </li>

        <li>
            <a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
        </li>

        <li>
            <a href="blog.html">Blog</a>
        </li>

        <li>
            <a href="about.html">About</a>
        </li> -->

        <!-- Menu kontak mobile -->
        <li>
            <a href="<?php echo base_url('kontak') ?>">Contact</a>
        </li>
    </ul>
</div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="<?php echo base_url() ?>assets/templat/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15">
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Search...">
        </form>
    </div>
</div>
</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="<?php echo base_url() ?>assets/templat/images/item-cart-01.jpg" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            White Shirt Pleat
                        </a>

                        <span class="header-cart-item-info">
                            1 x $19.00
                        </span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="<?php echo base_url() ?>assets/templat/images/item-cart-02.jpg" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Converse All Star
                        </a>

                        <span class="header-cart-item-info">
                            1 x $39.00
                        </span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="<?php echo base_url() ?>assets/templat/images/item-cart-03.jpg" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Nixon Porter Leather
                        </a>

                        <span class="header-cart-item-info">
                            1 x $17.00
                        </span>
                    </div>
                </li>
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>