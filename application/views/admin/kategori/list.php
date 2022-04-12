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
                    <!-- <div class="card-body"> -->
                    <!-- <h4 class="card-title">Data Table</h4> -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Produk</th>
                                    <th>Nama</th>
                                    <th>Sub Kategori</th>
                                    <th>Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kategori as $kategori) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $kategori->id_kategori ?></td>
                                        <td><?php echo $kategori->nama_kategori ?></td>
                                        <td><?php echo $kategori->sub_kategori ?></td>
                                        <td><?php echo $kategori->urutan ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/kategori/edit/' . $kategori->id_kategori; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                            <a href="<?php echo base_url() . 'admin/kategori/delete/' . $kategori->id_kategori; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>

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