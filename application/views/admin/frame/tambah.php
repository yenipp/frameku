<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
        //Error Upload
        if (isset($error)) {
            echo '<p class="alert alert-warning">';
            echo $error;
            echo '</p>';
        }

        //Notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        //Form open
        echo form_open_multipart(base_url('admin/frame/tambah1'), 'class="form-validation"');
        $id_frame = strtoupper(random_string('alnum', 5));
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>ID Frame</h6>
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
                                <input type="text" name="id_frame" id="id_frame" class="form-control" value="<?php echo randomString(5); ?>" readonly required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Nama Frame</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_frame" placeholder="Nama frame" value="<?php echo set_value('nama_frame') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-form-label"></div>
                            <div class="col-lg-4">
                                <img src="<?= base_url('assets/upload/image/nofoto.jpg') ?>" id="gambar_load" width="150px" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Upload Gambar contoh</h6>
                            </label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control" name="gambar_contoh" id="preview_gambar" value="<?php echo set_value('gambar_contoh') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Upload Gambar Frame</h6>
                            </label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control" name="gambar_frame" id="preview_gambar_frame" value="<?php echo set_value('gambar_frame') ?>">
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