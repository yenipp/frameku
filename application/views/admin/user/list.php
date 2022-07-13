<!--**********************************
            Content body start
    ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">

        <!-- <p>
            <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                    <div class="card-body">
                        <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        <center>
                            <h4 class="card-title">DATA ADMIN</h4>
                        </center>
                        <!-- <h4 class="card-title">Data Table</h4> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6><b>No</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>ID User</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Nama</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Username</b></h6>
                                        </th>
                                        <th>
                                            <h6><b>Akses Level</b></h6>
                                        </th>
                                        <?php if ($this->session->userdata('akses_level') !== "Admin") { ?>
                                            <th>
                                                <h6><b>Aksi</b></h6>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $user) { ?>
                                        <tr>
                                            <td>
                                                <h6><?php echo $no++ ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $user->id_pengguna ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $user->nama_pengguna ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $user->username ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $user->akses_level ?></h6>
                                            </td>
                                            <?php if ($this->session->userdata('akses_level') !== "Admin") { ?>
                                                <td>
                                                    <!-- <a href="<?php echo base_url() . 'admin/user/edit/' . $user->id_pengguna; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
                                                    <!-- <a href="<?php echo base_url() . 'admin/user/delete/' . $user->id_pengguna; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"> Hapus</a> -->

                                                    <a href="<?php echo base_url() . 'admin/user/edit/' . $user->id_pengguna; ?>" class="btn btn-warning btn-xs">
                                                        <h4><i class="fa fa-edit"></i></h4>
                                                    </a>
                                                    <?php include('delete_user.php') ?>
                                                    <!-- <a href="<?php echo base_url() . 'admin/user/delete/' . $user->id_pengguna; ?>" class="btn btn-danger btn-xs">
                                                        <h4><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"></h4>
                                                    </a> -->
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