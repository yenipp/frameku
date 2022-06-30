<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Produk
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="row">

                <!-- Product -->
                <div class="row">

                    <?php foreach ($produk as $produk) { ?>
                        <div class="item-slick2 p-l-50 p-r-15">

                            <?php
                            //Form untuk memproses belanjaan
                            echo form_open(base_url('belanja/wishlist'));
                            //Elemen yang dibawa
                            echo form_hidden('id', $produk->id_produk);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $produk->harga_produk);
                            echo form_hidden('name', $produk->nama_produk);
                            //Elemen redirect
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>

                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk); ?>" alt="<?php echo $produk->nama_produk ?>" height="200">

                                    <div class="block2-overlay trans-0-4">
                                        <!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <button type="submit" name="submit" value="submit" class="icon-wishlist icon_heart dis-none" aria-hidden="true"></button>
                                        </a> -->

                                        <div class="block2-txt p-t-150">
                                            <a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>" class="flex-c-m size1 s-text1 trans-0-4">
                                                <b>Detail produk</b>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
                                        <?php echo $produk->nama_produk ?>
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        IDR <?php echo number_format($produk->harga_produk, '0', ',', '.') ?>
                                    </span>
                                </div>

                                <!-- Button add to wishlist yaa-->
                                <button type="submit" name="submit" value="submit" class="flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4">
                                    <i class="fa fa-heart"></i>
                                </button>
                            </div>
                            <?php
                            //Closing form
                            echo form_close();
                            ?>
                        </div>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>

</section>