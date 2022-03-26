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
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor ID Produk</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="id_produk" placeholder="Nomor ID produk" value="<?php echo $produk->id_produk ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Produk</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk" value="<?php echo $produk->nama_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Kode Produk</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="kode_produk" placeholder="Kode produk" value="<?php echo $produk->kode_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Kategori Produk</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="id_kategori">
                                    <?php foreach ($kategori as $kategori) { ?>
                                        <option value="<?php echo $kategori->id_kategori ?>">
                                            <!--  <?php if ($produk->id_kategori == $kategori->id_kategori) {
                                                        echo "selected";
                                                    } ?>> -->
                                            <?php echo $kategori->nama_kategori ?>
                                        </option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Harga Produk</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="harga_produk" placeholder="Harga produk" value="<?php echo $produk->harga_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Stok Produk</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="stok_produk" placeholder="Stok produk" value="<?php echo $produk->stok_produk ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Keterangan Produk</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="keterangan" placeholder="keterangan, berat, ukuran produk" value="<?php echo $produk->keterangan ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Keyword</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="keyword" placeholder="Keyword (untuk SEO Google)" value="<?php echo $produk->stok_produk ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Upload Gambar produk</label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control" name="gambar_produk" placeholder="gambar produk" value="<?php echo $produk->gambar_produk ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Status produk</label>
                            <div class="col-lg-8">
                                <select name="status_produk" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft" <?php if ($produk->status_produk == "Draft") {
                                                                echo "selected";
                                                            } ?>>Simpan Sebagai Draft</option>
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