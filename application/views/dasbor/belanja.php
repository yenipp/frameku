<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>

                </div>
            </div>

            <div class="col-sm-6 col-md-9 col-lg-9 p-b-50">

                <h1><?php echo $title ?></h1>
                <p>Daftar produk favorit saya</p>

                <div class="header-wrapicon2">

                    <?php
                    //Check data belanjaan ada atau tidak
                    $keranjang      = $this->cart->contents();
                    ?>

                    <?php echo count($keranjang) ?></span>

                    <?php
                    //Kalau ga ada data belanjaan
                    if (empty($keranjang)) {
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
                        foreach ($keranjang as $keranjang) {
                            $id_produk  = $keranjang['id'];
                            //Ambil data produk
                            $produknya = $this->produk_model->detail($id_produk);
                        ?>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?php echo base_url('assets/upload/frame/' . $produknya->gambar_produk) ?>" alt="<?php echo $keranjang['name'] ?>">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="<?php echo base_url('produk/detail/' . $produknya->slug_produk) ?>" class="header-cart-item-name">
                                        <?php echo $keranjang['name'] ?>
                                    </a>

                                    <a class="header-cart-item-info">
                                        <?php echo number_format($keranjang['price'], '0', ',', '.') ?>
                                    </a>

                                    <!-- <span class="header-cart-item-info">
                                        <?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'], '0', ',', '.') ?> : Rp. <?php echo number_format($keranjang['subtotal'], '0', ',', '.') ?>
                                    </span> -->
                                </div>
                            </li>
                            <td>
                                <a href="<?php echo base_url('belanja/hapus/' . $keranjang['rowid']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-trash-o"> Hapus</i>
                                </a>
                            </td>
                    <?php
                        } //Tutup foreach keranjang
                    } // Tutup if
                    ?>


                    </ul>
                </div>


            </div>


        </div>
    </div>
    </div>
</section>