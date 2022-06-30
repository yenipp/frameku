<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="pos-relative">
            <div class="bgwhite">
                <h1><?php echo $title ?></h1>
                <div class="clearfix"></div>
                <br><br>

                <?php if ($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo $this->session->flashdata('sukses');
                    echo '</div>';
                } ?>

                <p class="alert alert-success">Sudah memiliki akun? Silakan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login di sini</a></p>

                <div class="col-md-12">
                    <?php
                    //Display error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');

                    //Form open
                    echo form_open(base_url('registrasi'), 'class="leave-comment"');
                    $id_pelanggan = date('d') . strtoupper(random_string('alnum', 3));
                    ?>

                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <td>ID Pelanggan</td>
                                <?php
                                function randomString($length)
                                {
                                    $str        = "";
                                    $characters = '123456789';
                                    $max        = strlen($characters) - 1;
                                    for ($i = 0; $i < $length; $i++) {
                                        $rand = mt_rand(0, $max);
                                        $str .= $characters[$rand];
                                    }
                                    return $str;
                                }
                                ?>
                                <th><input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" value="<?php echo randomString(4); ?>" readonly required>
                            </tr>
                            <tr>
                                <th width="25%">Nama</th>
                                <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama_pelanggan') ?>" required></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <th><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></th>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <th><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></th>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <th><input type="telepon" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required></th>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <th><input type="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required></th>
                            </tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                                <button class="btn btn-default btn-sm" type="reset">
                                    <i class="fa fa-times"></i> Reset
                                </button>
                            </td>
                        </tbody>
                    </table>

                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">

            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">

            </div>
        </div>


    </div>
</section>