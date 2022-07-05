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
        echo form_open_multipart(base_url('admin/produk/gambar/' . $produk->id_produk), 'class="form-validation"');
        ?>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
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
                                <input type="hidden" name="id_gambar" id="id_gambar" class="form-control" value="<?php echo randomString(4); ?>" readonly required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>ID Produk</h6>
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
                                <input type="text" class="form-control" name="nama_produk" value="<?php echo $produk->nama_produk ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">
                                <h6>Judul Gambar</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="judul_gambar" placeholder="Nama gambar" value="<?php echo set_value('judul_gambar') ?>" required>
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
                                <h6>Unggah Gambar</h6>
                            </label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar" id="preview_gambar" placeholder="Gambar produk" value="<?php echo set_value('gambar') ?>" required>
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
                                                        <h6><b>Gambar</b></h6>
                                                    </th>
                                                    <th>
                                                        <h6><b>Judul Gambar</b></h6>
                                                    </th>
                                                    <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                                        <th>
                                                            <h6><b>Aksi</b></h6>
                                                        </th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <!-- <td><?php echo $gambar->id_gambar ?></td> -->
                                                    <td>
                                                        <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" class="img" width="60">
                                                    </td>
                                                    <td><?php echo $produk->nama_produk ?></td>
                                                    <td>

                                                    </td>
                                                </tr>

                                                <?php $no = 2;
                                                foreach ($gambar as $gambar) { ?>
                                                    <tr>
                                                        <td>
                                                            <h6><?php echo $no++ ?></h6>
                                                        </td>
                                                        <!-- <td><?php echo $gambar->id_gambar ?></td> -->
                                                        <td>
                                                            <img src="<?php echo base_url('assets/upload/frame/' . $gambar->gambar) ?>" class="img" width="80">
                                                        </td>
                                                        <td>
                                                            <h6><?php echo $gambar->judul_gambar ?></h6>
                                                        </td>
                                                        <?php if ($this->session->userdata('akses_level') !== "Super Admin") { ?>
                                                            <td>
                                                                <a href="<?php echo base_url() . 'admin/produk/delete_gambar/' .  $produk->id_produk . '/' . $gambar->id_gambar; ?>" class="btn btn-danger btn-xs">
                                                                    <h4><i class="fa fa-trash-o"></i onclick="return confirm('Yakin ingin menghapus data ini?')"></h4>
                                                                </a>
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