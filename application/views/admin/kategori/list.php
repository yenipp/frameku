<!--**********************************
            Content body start
    ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">

        <p>
            <a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                    <div class="card-body">
                        <h4 class="card-title">KATEGORI PRODUK</h4>
                        <!-- <h4 class="card-title">Data Table</h4> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6><b>No</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Kategori</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Nama</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Slug Kategori</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Urutan</b></h6>
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
                                    foreach ($kategori as $kategori) { ?>
                                        <tr>
                                            <td>
                                                <h6><?php echo $no++ ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $kategori->id_kategori ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $kategori->nama_kategori ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $kategori->slug_kategori ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $kategori->urutan ?></h6>
                                            </td>
                                            <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                                <td>
                                                    <a href="<?php echo base_url() . 'admin/kategori/edit/' . $kategori->id_kategori; ?>" class="btn btn-warning btn-xs">
                                                        <h4><i class="fa fa-edit"></i></h4>
                                                    </a>
                                                    <a href="<?php echo base_url() . 'admin/kategori/delete/' . $kategori->id_kategori; ?>" class="btn btn-danger btn-xs">
                                                        <h4><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"></h4>
                                                    </a>
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