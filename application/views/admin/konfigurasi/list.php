<div class="content-body">
    <div class="container-fluid mt-3">
        <?php
        //Notifikasi
        if ($this->session->flashdata('sukses')) {
            echo '<p class="alert alert-success">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        ?>

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
        echo form_open_multipart(base_url('admin/konfigurasi/'), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor ID Konfigurasi</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" name="id_konfigurasi" placeholder="Nomor ID konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Website</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="nama_web" placeholder="Nama Website" value="<?php echo $konfigurasi->nama_web ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Facebook</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="facebook" placeholder="Nama Facebook" value="<?php echo $konfigurasi->facebook ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Instagram</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="instagram" placeholder="Nama Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Tagline/Moto</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="tagline" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Website</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="website" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Alamat kantor</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat kantor" value="<?php echo $konfigurasi->alamat ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Telepon</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="<?php echo $konfigurasi->telepon ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Email</label>
                            <div class="col-lg-8">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Keyword</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="keyword" placeholder="Keyword (untuk SEO Google)" value="<?php echo $konfigurasi->keyword ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Kode Meta text</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="meta_text" placeholder="Meta text" value="<?php echo $konfigurasi->meta_text ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Deskripsi</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" value="<?php echo $konfigurasi->deskripsi ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">rekening Pembayaran</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="rekening_pembayaran" placeholder="Rekening Pembayaran" value="<?php echo $konfigurasi->rekening_pembayaran ?>">
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