<!--**********************************
            Content body start
    ***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">

        <p>
            <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn mb-1 btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
                                    <th>ID User</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Akses Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $user) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $user->id_pengguna ?></td>
                                        <td><?php echo $user->nama_pengguna ?></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php echo $user->username ?></td>
                                        <td><?php echo $user->akses_level ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'admin/user/edit/' . $user->id_pengguna; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                            <a href="<?php echo base_url() . 'admin/user/delete/' . $user->id_pengguna; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"> Hapus</a>

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