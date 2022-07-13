<?php
//Load data konfigurasi website
// $site              = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();
?>

<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-250 p-r-100">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                ALAMAT
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Jl. Raya Kasianto, Goranggareng, Kawedanan, Magetan
                    <!-- <br><i class="fa fa-envelope"></i> optikwijaya@gmail.com -->
                    <!-- <br><i class="fa fa-phone"></i> 085779842345 -->
                </p>
            </div>
        </div>

        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <!-- <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4"> -->
            <h4 class="s-text12 p-b-30">
                Kategori Produk
            </h4>

            <ul>
                <?php foreach ($nav_produk_footer as $nav_produk_footer) { ?>
                    <li class="p-b-9">
                        <a href="<?php echo base_url('produk/kategori/' . $nav_produk_footer->slug_kategori) ?>" class="s-text7">
                            <?php echo $nav_produk_footer->nama_kategori ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                KONTAK KAMI
            </h4>

            <ul>
                <li class="p-b-9">
                    <a class="s-text7"><i class="fa fa-envelope"></i>
                        optikwijaya@gmail.com
                    </a>
                </li>

                <li class="p-b-9">
                    <a class="s-text7"><i class="fa fa-phone"></i>
                        085779842345
                    </a>
                </li>
            </ul>
        </div>


    </div>


</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.form-select').niceSelect();
    })
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/templat/vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript">
    // $('.block2-btn-addcart').each(function() {
    //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    //     $(this).on('click', function() {
    //         swal(nameProduct, "is added to cart !", "success");
    //     });
    // });

    $('.block2-btn-addwishlist').each(function() {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function() {
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->
<script src="<?php echo base_url() ?>assets/templat/js/main.js"></script>

</body>

</html>