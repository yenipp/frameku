<!--**********************************
           Content body start
    ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">

        <!-- <p>
            <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
        </p> -->

        <?php
        //Notifikasi
        if ($this->session->flashdata('sukses')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        ?>


        <!-- <div class="container-fluid"> -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <?php echo print_r($produk) ?> -->
                    <div class="card-body">
                        <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                            <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        <?php } ?>
                        <center>
                            <h4 class="card-title">DATA FRAME</h4>
                        </center>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6><b>No</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Gambar</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Nama Produk</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Kategori</b></h6>
                                        </th>
                                        <!-- <th>
                                            <h6><b>Harga</b></h6>
                                        </th> -->
                                        <th>
                                            <h6><b>Status</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Gambar Frame</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Gambar lain</b></h6>
                                        </th>
                                        <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                            <th>
                                                <h6><b>Aksi</b></h6>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($produk as $produk) { ?>
                                        <tr>
                                            <td>
                                                <h6><?php echo $no++ ?></h6>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'admin/produk/detail_produk/' . $produk->id_produk; ?>">
                                                    <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" class="img" width="70">
                                                    <!-- <div class="overlay" id="<?php echo $produk->id_produk ?>"></div> -->

                                                </a>
                                                <!-- <div class="overlay" id="<?php echo $produk->id_produk ?>"></div> -->
                                            </td>
                                            <!-- <td>
                                            <h6><?php echo $produk->id_produk ?></h6>
                                        </td> -->
                                            <td>
                                                <h6><?php echo substr($produk->nama_produk, 0, 20) ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $produk->nama_kategori ?></h6>
                                            </td>
                                            <!-- <td>
                                                <h6><?php echo number_format($produk->harga_produk, '0', ',', '.') ?></h6>
                                            </td> -->
                                            <td>
                                                <h6><?php echo $produk->status_produk ?></h6>
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_frame) ?>" class="img" width="70">
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'admin/produk/gambar/' . $produk->id_produk; ?>" class="btn btn-success btn-xs">
                                                    <i class="fa fa-image"></i> (<?php echo $produk->total_gambar ?>)
                                                </a>
                                            </td>
                                            <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                                <td>
                                                    <!-- <a href="<?php echo base_url() . 'admin/produk/detail_produk/' . $produk->id_produk; ?>" class="btn btn-info btn-xs"><i class="fa fa-search-plus"></i> Detail</a> -->
                                                    <a href="<?php echo base_url() . 'admin/produk/edit/' . $produk->id_produk; ?>" class="btn btn-warning btn-xs">
                                                        <h4><i class="fa fa-edit"></i></h4>
                                                    </a>
                                                    <?php include('delete.php') ?>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <!-- </div> -->


        </div>
    </div>