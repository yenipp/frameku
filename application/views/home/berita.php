<!-- Blog -->
<section class="blog bgwhite p-t-94 p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Our Blog
            </h3>
        </div>

        <div class="row">
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">

                <?php foreach ($berita as $berita) { ?>

                    <div class="item-slick2 p-l-15 p-r-15">

                        <div class="block3">
                            <a href="blog-detail.html" class="block3-img dis-block hov-img-zoom">
                                <!-- <img src="<?php echo base_url() ?>assets/templat/images/blog-01.jpg" alt="IMG-BLOG"> -->
                                <img src="<?php echo base_url('assets/upload/frame/' . $berita->gambar_berita) ?>" alt="<?php echo $berita->nama_berita ?>">

                            </a>

                            <div class="block3-txt p-t-14">
                                <h4 class="p-b-7">
                                    <a href="blog-detail.html" class="m-text11">
                                        <?php echo $berita->nama_berita ?>
                                    </a>
                                </h4>

                                <!-- <span class="s-text6">By</span> <span class="s-text7">Nancy Ward</span> -->
                                <!-- <span class="s-text6">on</span> <span class="s-text7">July 22, 2017</span> -->

                                <!-- <p class="s-text8 p-t-16">
                            Duis ut velit gravida nibh bibendum commodo. Sus-pendisse pellentesque mattis augue id euismod. Inter-dum et malesuada fames
                        </p> -->
                            </div>
                        </div>

                        <?php
                        //Closing form
                        echo form_close();
                        ?>
                    </div>
                <?php } ?>
                <!-- Block3 -->

            </div>


        </div>
    </div>
</section>