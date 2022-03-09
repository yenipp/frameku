<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
        //Notifikasi error
        echo validation_errors('<div class="alert alert-warning">', '</div>');

        //Form open
        echo form_open(base_url('admin/kategori/edit/' . $kategori->id_kategori), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor ID Kategori</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="id_kategori" placeholder="Nomor ID kategori" value="<?php echo $kategori->id_kategori ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Kategori</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori" value="<?php echo $kategori->nama_kategori ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Urutan</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="urutan" placeholder="Urutan" value="<?php echo $kategori->urutan ?>" required>
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