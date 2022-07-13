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

                    <?php foreach ($produk as $key => $produk) { ?>
                        <div class="item-slick2 p-l-50 p-r-15">
                            <div class="block2">
                                <br>
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk); ?>" alt="<?php echo $produk->nama_produk ?>" height="200">

                                    <div class="block2-overlay trans-0-4">
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

                                <form class="form-like" id="form<?= $key ?>" data-id="<?= $key ?>" data-nama="<?= $produk->nama_produk ?>" action="<?= base_url() ?>" method="POST" enctype="multipart/form-data">
                                    <div class="d-none">
                                        <input type="text" name="id_produk" value="<?= $produk->id_produk ?>">
                                        <input type="text" name="nama_produk" value="<?= $produk->nama_produk ?>">
                                        <input type="text" name="gambar_produk" value="<?= $produk->gambar_produk ?>">
                                        <input type="text" name="harga_produk" value="<?= $produk->harga_produk ?>">
                                    </div>
                                    <div id="tempel-btn-<?= $key ?>">
                                        <?php if ($this->session->userdata('id_pelanggan') == '') : ?>
                                            <button onclick="window.location.href='<?= base_url('Masuk') ?>'" type="button" class="flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4"><i class="fa fa-heart"></i></button>
                                            <?php else :
                                            $data = [
                                                'id_pelanggan'  => $this->session->userdata('id_pelanggan'),
                                                'id_produk'     => $produk->id_produk,
                                                'nama_produk'   => $produk->nama_produk,
                                                'gambar_produk' => $produk->gambar_produk,
                                                'harga_produk'  => $produk->harga_produk,
                                            ];
                                            $hasil = $this->db->get_where('tb_wishlist', $data);
                                            if ($hasil->num_rows() == 0) : ?>
                                                <button type="submit" name="submit" value="submit" class="flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4"><i class="fa fa-heart"></i></button>
                                            <?php else : ?>
                                                <button type="submit" name="submit" value="submit" class="bg-danger flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4"><i class="fa fa-heart"></i></button>
                                        <?php endif;
                                        endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $('.form-like').on('submit', function(e) {
            e.preventDefault();
            var id_key = $(this).data('id');
            var nama_key = $(this).data('nama');
            var myformData = $('#form' + id_key).serialize();
            $.ajax({
                type: "post",
                url: "<?= base_url('Produk/like_barang/') ?>",
                data: myformData,
                success: function(response) {
                    if (response == 1) {
                        $('#tempel-btn-' + id_key).html(
                            '<button type="submit" name="submit" value="submit" class="bg-danger flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4"><i class="fa fa-heart"></i></button>'
                        );
                        Toast.fire({
                            icon: 'success',
                            title: nama_key + ' berhasil ditambahkan ke daftar favorit'
                        })
                    } else if (response == 0) {
                        $('#tempel-btn-' + id_key).html(
                            '<button type="submit" name="submit" value="submit" class="flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4"><i class="fa fa-heart"></i></button>'
                        );
                        Toast.fire({
                            icon: 'success',
                            title: nama_key + ' berhasil dihapus dari daftar favorit'
                        })
                    }
                }
            });
        })
    })
</script>