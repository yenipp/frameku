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
        echo form_open_multipart(base_url('admin/konfigurasi/logo'), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nomor ID Konfigurasi</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="id_konfigurasi" placeholder="Nomor ID konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Website</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_web" placeholder="Nama Website" value="<?php echo $konfigurasi->nama_web ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Upload Logo Baru</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="logo" placeholder="Upload logo baru" value="<?php echo $konfigurasi->logo ?>" required>
                                <div class="col-lg-6">
                                    Logo lama : <img src="<?php echo base_url('assets/upload/image/' . $konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" width="200">
                                </div>
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