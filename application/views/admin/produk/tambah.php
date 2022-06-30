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
        echo form_open_multipart(base_url('admin/produk/tambah'), 'class="form-validation"');
        $id_produk = strtoupper(random_string('alnum', 5));
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">TAMBAH PRODUK</h4>
                    <br>
                    <div class="form-validation">
                        <!-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>ID Produk</h6>
                            </label> -->
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
                            <input type="hidden" name="id_produk" id="id_produk" class="form-control" value="<?php echo randomString(5); ?>" readonly required>
                        </div>
                        <!-- <label class="col-lg-4 col-form-label">
                                <h6>ID Produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <th><input type="text" name="id_produk" class="form-control" value="<?php echo $id_produk ?>" readonly required></th>
                            </div> -->
                        <!-- </div> -->

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Nama Frame</h5>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama frame" value="<?php echo set_value('nama_produk') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Kode Frame</h5>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="kode_produk" placeholder="Kode frame" value="<?php echo set_value('kode_produk') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Kategori</h5>
                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="id_kategori">
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option value="<?php echo $kategori->id_kategori ?>">
                                            <?php echo $kategori->nama_kategori ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Harga</h5>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="harga_produk" placeholder="Harga" value="<?php echo set_value('harga_produk') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Keterangan</h5>
                            </label>
                            <div class="col-lg-6">
                                <textarea type="text" class="form-control" name="keterangan" placeholder="keterangan, berat, warna" value="<?php echo set_value('keterangan') ?>" rows="10" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-form-label"></div>
                            <div class="col-lg-6">
                                <img src="<?= base_url('assets/upload/image/nofoto.png') ?>" id="gambar_load" width="150px" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Upload Gambar Kacamata</h5>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar_produk" id="preview_gambar" value="<?php echo set_value('gambar_produk') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-form-label"></div>
                            <div class="col-lg-6">
                                <img src="<?= base_url('assets/upload/image/nofoto.png') ?>" id="gambar_load_frame" width="150px" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Upload Gambar Frame</h5>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar_frame" id="preview_gambar_frame" value="<?php echo set_value('gambar_frame') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h5>Status</h5>
                            </label>
                            <div class="col-lg-6">
                                <select name="status_produk" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft">Simpan Sebagai Draft</option>
                                </select>
                            </div>
                        </div>
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