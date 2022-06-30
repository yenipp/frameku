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

                <p class="alert alert-success">Belum memiliki akun? Silakan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-info btn-sm">Registrasi di sini</a></p>

                <div class="col-md-12">
                    <?php
                    //Display error
                    echo validation_errors('<div class="alert alert-warning">', '</div>');

                    //Display notifikasi error login
                    if ($this->session->flashdata('warning')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('warning');
                        echo '</div>';
                    }

                    //Display notifikasi sukses logout
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    //Form open
                    echo form_open(base_url('masuk'), 'class="leave-comment"');
                    ?>

                    <table class="table">

                        <tbody>
                            <tr>
                                <td width="20%">Email (Username)</td>
                                <th><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></th>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <th><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></th>
                            </tr>

                            <td></td>
                            <td>
                                <button class="btn btn-success btn-sm" type="submit">
                                    <!-- <i class="fa fa-save"></i>  --> Login
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