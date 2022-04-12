<!--**********************************
           Content body start
    ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">

        <p>
            <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
        </p>

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
                    <!-- <div class="card-body"> -->
                    <!-- <h4 class="card-title">Data Table</h4> -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $produk) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <img src="<?php echo base_url('assets/upload/image/' . $produk->gambar_produk) ?>" class="img" width="60">
                                        </td>
                                        <td><?php echo $produk->id_produk ?></td>
                                        <td><?php echo $produk->nama_produk ?></td>
                                        <td><?php echo $produk->nama_kategori ?></td>
                                        <td><?php echo number_format($produk->harga_produk, '0', ',', '.') ?></td>
                                        <td><?php echo $produk->status_produk ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/produk/gambar/' . $produk->id_produk; ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Gambar (<?php echo $produk->total_gambar ?>)</a>

                                            <a href="<?php echo base_url() . 'admin/produk/edit/' . $produk->id_produk; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                            <?php include('delete.php') ?>

                                        </td>
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