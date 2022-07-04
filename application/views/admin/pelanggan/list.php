<!--**********************************
            Content body start
    ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">

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
                        <h4 class="card-title">DATA PELANGGAN</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <!-- <th>No Telepon</th>
                                        <th>Alamat</th> -->
                                        <th>Tanggal Daftar</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pelanggan as $pelanggan) { ?>
                                        <tr>
                                            <td>
                                                <h6><?php echo $no++ ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $pelanggan->id_pelanggan ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $pelanggan->nama_pelanggan ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $pelanggan->email ?></h6>
                                            </td>
                                            <!-- <td>
                                                <h6><?php echo $pelanggan->telepon ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $pelanggan->alamat ?></h6>
                                            </td> -->
                                            <td>
                                                <h6><?php echo $pelanggan->tanggal_daftar ?></h6>
                                            </td>
                                            <td>
                                                <!-- <a href="<?php echo base_url() . 'admin/pelanggan/delete/' . $pelanggan->id_pelanggan; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"> Hapus</a> -->

                                                <!-- <a href="<?php echo base_url() . 'admin/pelanggan/delete/' . $pelanggan->id_pelanggan; ?>" class="btn btn-danger btn-xs">
                                                    <h4><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"></h4>
                                                </a> -->
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