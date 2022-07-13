<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <?php include('menu.php') ?>

                </div>
            </div>

            <div class="col-sm-6 col-md-9 col-lg-9 p-b-50">
                <h4><?php echo $title ?></h4>
                <br>

                <?php
                //Notifikasi
                if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-success">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                }

                //Display error
                echo validation_errors('<div class="alert alert-warning">', '</div>');

                //Form open
                echo form_open(base_url('dasbor/profil'), 'class="leave-comment"');
                ?>

                <table class="table table-light">
                    <thead class="thead-light">
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <th><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly></th>
                        </tr>
                        <tr>
                            <td>Password Baru</td>
                            <th><input type="password" name="password" class="form-control" placeholder="Ketikkan Password baru" value="<?php echo set_value('password') ?>">
                                <!-- <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span> -->
                            </th>
                        </tr>

                        <tr>
                            <td>Ulangi Password Baru</td>
                            <th><input type="password" name="password2" class="form-control" placeholder="Ulangi Password" value="<?php echo set_value('password') ?>">
                                <!-- <span class="text-danger">Ketik minimal 6 karakter untuk mengganti password baru atau biarkan kosong</span> -->
                            </th>
                        </tr>
                        <!-- <tr>
                            <td>Telepon</td>
                            <th><input type="telepon" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required></th>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <th><input type="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $pelanggan->alamat ?>" required>
                            </th>
                        </tr> -->
                        <td></td>
                        <td>
                            <button class="btn btn-info btn-sm" type="submit">
                                <i class="fa fa-save"></i> Update Profil
                            </button>
                            <!-- <button class="btn btn-default btn-sm" type="reset">
                                <i class="fa fa-times"></i> Reset
                            </button> -->
                        </td>
                    </tbody>
                </table>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</section>