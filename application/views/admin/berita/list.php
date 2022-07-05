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
        echo form_open_multipart(base_url('admin/berita/tambah/'), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">DATA BERITA</h4>

                    <div class="form-validation">
                        <div class="form-group row">
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
                                <input type="hidden" name="id_berita" id="id_berita" class="form-control" value="<?php echo randomString(4); ?>" readonly required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Nama Berita</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_berita" placeholder="Nama berita" value="<?php echo set_value('nama_berita') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Unggah Gambar Berita</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar_berita" value="<?php echo set_value('gambar_berita') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Status Berita</h6>
                            </label>
                            <div class="col-lg-6">
                                <select name="status_berita" class="form-control">
                                    <option value="Publish">Publikasikan</option>
                                    <option value="Draft">Simpan Sebagai Draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label"></label>
                            <div class="col-lg-6">
                                <button name="submit" type="submit" class="btn mb-1 btn-success"><i class="fa fa-save"></i> Simpan dan Unggah</button>
                                <button name="reset" type="reset" class="btn mb-1 btn-info"><i class="fa fa-times"></i> Reset</button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>

                        <?php
                        //Notifikasi
                        if ($this->session->flashdata('sukses')) {
                            echo '<p class="alert alert-success">';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                        }
                        ?>


                        <!-- <div class="container-fluid"> -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- <div class="card-body"> -->
                                    <!-- <h4 class="card-title">Data Table</h4> -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h6><b>No</b></h6>
                                                    </th>
                                                    <th>
                                                        <h6><b>Gambar Berita</b></h6>
                                                    </th>
                                                    <th>
                                                        <h6><b>Nama Berita</b></h6>
                                                    </th>
                                                    <th>
                                                        <h6><b>Status</b></h6>
                                                    </th>
                                                    <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                                        <th>
                                                            <h6><b>Aksi</b></h6>
                                                        </th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($berita as $berita) { ?>
                                                    <tr>
                                                        <td>
                                                            <h6><?php echo $no++ ?></h6>
                                                        </td>
                                                        <td>
                                                            <img src="<?php echo base_url('assets/upload/frame/' . $berita->gambar_berita) ?>" class="img" width="70">
                                                        </td>
                                                        <td>
                                                            <h6><?php echo $berita->nama_berita ?></h6>
                                                        </td>
                                                        <td>
                                                            <h6><?php echo $berita->status_berita ?></h6>
                                                        </td>
                                                        <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                                            <td>
                                                                <!-- <a href="<?php echo base_url() . 'admin/berita/edit/' . $berita->id_berita; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a> -->

                                                                <a href="<?php echo base_url() . 'admin/berita/delete/' . $berita->id_berita; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"></a>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->


                    </div>
                </div>