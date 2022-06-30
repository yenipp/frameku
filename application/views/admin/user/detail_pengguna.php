<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PROFIL SAYA</h4>
                    <br>
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">ID Admin</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="id_pengguna" placeholder="ID Pengguna" value="<?php echo $user->id_pengguna ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Akses Level</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="akses_level" placeholder="Akses Level" value="<?php echo $user->akses_level ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Lengkap</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo $user->nama_pengguna ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user->email ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Username</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user->username ?>" required>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $user->password ?>">
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password Lama</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" placeholder="Password Lama" value="<?php echo $user->password ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password Baru</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Ulangi Password Baru</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password2" id="password" placeholder="Ulangi Password Baru" required>
                            </div>
                        </div>

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

            <!-- <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DETAIL PENGGUNA</h4>
                        <div class="basic-form">

                            <table class="table">
                                <tr>
                                    <th>
                                        <h5>ID Pengguna</h5>
                                    </th>
                                    <th><input type="text" name="id_pengguna" class="form-control" placeholder="ID Pengguna" value="<?php echo $user->id_pengguna ?>" readonly></th>
                                </tr>

                                <tr>
                                    <th>
                                        <h5>Nama Pengguna</h5>
                                    </th>
                                    <th><input type="text" name="nama_pengguna" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama_pengguna ?>" required></th>
                                </tr>

                                <tr>
                                    <th>
                                        <h5>Email Pengguna</h5>
                                    </th>
                                    <th><input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required></th>
                                </tr>

                                <tr>
                                    <th>
                                        <h5>Username Pengguna</h5>
                                    </th>
                                    <th><input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required></th>
                                </tr>

                                <tr>
                                    <th>
                                        <h5>Password Pengguna</h5>
                                    </th>
                                    <th><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $user->password ?>" required></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>