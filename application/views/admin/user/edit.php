<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
        //Notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        //Form open
        echo form_open(base_url('admin/user/edit/' . $user->id_pengguna), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT ADMIN</h4>
                    <br>
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor ID Admin</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="id_pengguna" placeholder="Nomor ID Admin" value="<?php echo $user->id_pengguna ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Admin</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Admin" value="<?php echo $user->nama_pengguna ?>" required>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="Email Admin" value="<?php echo $user->email ?>" required>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Username</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user->username ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password Lama</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" placeholder="Password Lama" value="<?php echo $user->password ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password Baru</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password baru" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Ulangi Password Baru</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password2" id="password" placeholder="Ulangi Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Level Hak Akses</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="akses_level" value="<?php echo $user->akses_level ?>" readonly>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Level Hak Akses</label>
                            <div class="col-lg-6">
                                <select type="text" class="form-control" name="akses_level">
                                    <option value="Admin">Admin</option>
                                    <option value="Super Admin" <?php if ($user->akses_level == "Super Admin") {
                                                                    echo "selected";
                                                                } ?>>Super Admin</option>
                                </select>
                            </div>
                        </div> -->
                        <br>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"></label>
                            <div class="col-lg-6">
                                <button name="submit" type="submit" class="btn mb-1 btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <button name="reset" type="reset" class="btn mb-1 btn-info"><i class="fa fa-times"></i> Reset</button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>