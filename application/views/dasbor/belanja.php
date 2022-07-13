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

                <div>
                    <h4>Selamat datang <?php echo $this->session->userdata('nama_pelanggan'); ?></h4>
                </div>
                <br>
                <!-- <h1><?php echo $title ?></h1> -->
                <p>Berikut adalah daftar favorit Anda</p>

                <?php
                //Kalau ada transaksi, tampilkan tabel
                if ($wishlist) { ?>
                    <table class="table table-bordered" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID produk</th>
                                <th>Gambar produk</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($wishlist as $wishlist) { ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $wishlist->id_produk ?></td>
                                    <td>
                                        <a href="<?php echo base_url('home') ?>">
                                            <img src="<?php echo base_url('assets/upload/frame/' . $wishlist->gambar_produk) ?>" class="img" width="100">
                                    </td>
                                    <td><?php echo $wishlist->nama_produk ?></td>
                                    <td><?php echo number_format($wishlist->harga_produk) ?></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                        <tfoot>
                            <!-- <tr>
                                <th>#</th>
                            </tr> -->
                        </tfoot>
                    </table>

                <?php
                    //Kalau tidak ada tampilkan notifikasi
                } else { ?>

                    <p class="alert alert-info">
                        <i class="fa fa-warning"></i> belum ada data favorit produk
                    </p>

                <?php } ?>


            </div>
        </div>
    </div>
</section>