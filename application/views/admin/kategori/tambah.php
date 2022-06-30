<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
        //Notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        //Form open
        echo form_open(base_url('admin/kategori/tambah'), 'class="form-validation"');
        $id_kategori = date('d') . strtoupper(random_string('alnum', 2));
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">TAMBAH KATEGORI</h4>
                    <br>
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Nomor Kategori</h6>
                            </label>
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
                            <div class="col-lg-6">
                                <input type="text" name="id_kategori" id="id_kategori" class="form-control" value="<?php echo randomString(3); ?>" readonly required>
                            </div>
                            <!-- <label class="col-lg-4 col-form-label">Nomor Kategori</label>
                            <div class="col-lg-6">
                                <th><input type="text" name="id_kategori" class="form-control" value="<?php echo $id_kategori ?>" readonly required></th>
                            </div> -->
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Nama Kategori</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Urutan</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="urutan" placeholder="Urutan kategori" value="<?php echo set_value('email') ?>" required>
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
        </div>
    </div>
</div>