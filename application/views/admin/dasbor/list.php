<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h2 class="card-title text-white">DATA PRODUK</h2>
                        <div class="d-inline-block">
                            <h3 class="text-white"><?php echo $this->dasbor_model->total_produk()->total;  ?><small> Produk</small></h3>
                            <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-grid menu-icon"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h2 class="card-title text-white">DATA BERITA</h2>
                        <div class="d-inline-block">
                            <h3 class="text-white"><?php echo $this->dasbor_model->total_berita()->total;  ?><small> Berita</small></h3>
                            <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-screen-tablet menu-icon"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-7">
                    <div class="card-body">
                        <h2 class="card-title text-white">DATA PELANGGAN</h2>
                        <div class="d-inline-block">
                            <h3 class="text-white"><?php echo $this->dasbor_model->total_pelanggan()->total;  ?><small> Pelanggan</small></h3>
                            <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h2 class="card-title text-white">DATA TRANSAKSI</h2>
                        <div class="d-inline-block">
                            <h3 class="text-white"><?php echo $this->dasbor_model->total_header_transaksi()->total;  ?> <small>Transaksi</small> </h3>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-3 col-sm-6">
                <div class="card gradient-5">
                    <div class="card-body">
                        <h2 class="card-title text-white">Transaksi Keseluruhan</h2>
                        <div class="d-inline-block">
                            <h3 class="text-white"><?php echo number_format($this->dasbor_model->total_transaksi()->total)  ?></h3>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">

                        <h2 class="card-title text-white">DATA ADMIN</h2>
                        <div class="d-inline-block">
                            <h3 class="text-white"><?php echo $this->dasbor_model->total_pengguna()->total;  ?> <small>Admin</small> </h3>
                            <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-lock"></i></span>
                    </div>
                </div>
            </div>

        </div>