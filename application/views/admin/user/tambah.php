<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
        //Notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        //Form open
        echo form_open(base_url('admin/user/tambah'), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor ID Admin</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="id_pengguna" placeholder="Nomor ID Admin" value="<?php echo set_value('id_pengguna') ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Admin</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Admin" value="<?php echo set_value('nama_pengguna') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="Email Admin" value="<?php echo set_value('email') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Username</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Level Hak Akses</label>
                            <div class="col-lg-6">
                                <select type="text" class="form-control" name="akses_level">
                                    <option value="Admin">Admin</option>
                                    <option value="Super Admin"> Super Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"></label>
                            <div class="col-lg-6">
                                <button name="submit" type="submit" class="btn mb-1 btn-info">Simpan</button>
                                <button name="reset" type="reset" class="btn mb-1 btn-secondary">Reset</button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>