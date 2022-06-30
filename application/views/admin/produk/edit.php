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
        echo form_open_multipart(base_url('admin/produk/edit/' . $produk->id_produk), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EDIT PRODUK</h4>
                    <br>
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Nomor ID Produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="id_produk" value="<?php echo $produk->id_produk ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Nama Produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk" value="<?php echo $produk->nama_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Kode Produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="kode_produk" placeholder="Kode produk" value="<?php echo $produk->kode_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Kategori Produk</h6>

                            </label>
                            <div class="col-lg-6">
                                <select class="form-control" name="id_kategori">
                                    <?php foreach ($kategori as $ktg) { ?>

                                        <?php if ($produk->id_kategori == $ktg->id_kategori) { ?>
                                            <option value="<?= $ktg->id_kategori ?>" selected><?= $ktg->nama_kategori ?></option>
                                        <?php } ?>
                                        <option value="<?= $ktg->id_kategori ?>"><?= $ktg->nama_kategori ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Harga Produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="harga_produk" placeholder="Harga produk" value="<?php echo $produk->harga_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Keterangan Produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="keterangan" placeholder="keterangan, berat, ukuran produk" value="<?php echo $produk->keterangan ?>" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-form-label"></div>
                            <div class="col-lg-6">
                                <?php
                                if ($produk->gambar_produk != null) { ?>
                                    <div>
                                        <img src="<?= base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" id="gambar_load" width="150px">
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Upload Gambar produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar_produk" id="preview_gambar" value="<?php echo $produk->gambar_produk ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4 col-form-label"></div>
                            <div class="col-lg-6">
                                <?php
                                if ($produk->gambar_frame != null) { ?>
                                    <div>
                                        <img src="<?= base_url('assets/upload/frame/' . $produk->gambar_frame) ?>" id="gambar_load_frame" width="150px">
                                    </div>
                                <?php
                                } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Upload Gambar Frame</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar_frame" id="preview_gambar_frame" value="<?php echo set_value('gambar_frame') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Status produk</h6>
                            </label>
                            <div class="col-lg-6">
                                <select name="status_produk" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft" <?php if ($produk->status_produk == "Draft") {
                                                                echo "selected";
                                                            } ?>>Simpan Sebagai Draft</option>
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