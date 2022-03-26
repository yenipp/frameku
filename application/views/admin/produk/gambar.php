<div class="content-body">
    <div class="container-fluid mt-3">

        <?php
        //Error Upload
        if(isset($error)) {
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
                            <label class="col-lg-4 col-form-label">Nomor ID Gambar</label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="id_gambar" placeholder="Nomor ID gambar" value="<?php echo set_value('id_gambar') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Judul Gambar</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="judul_gambar" placeholder="Nama gambar" value="<?php echo set_value('judul_gambar') ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Unggah Gambar</label>
                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="gambar" placeholder="Gambar produk" value="<?php echo set_value('gambar') ?>" required>
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
                                    <th>No</th>
                                    <!-- <th>ID Gambar</th> -->
                                    <th>Gambar</th>
                                    <th>Judul Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                        <td>1</td>
                                        <!-- <td><?php echo $gambar->id_gambar ?></td> -->
                                        <td>
                                            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar_produk) ?>" class="img" width="60">
                                        </td>
                                        <td><?php echo $produk->nama_produk ?></td>
                                        <td>

                                        </td>
                                    </tr>

                                <?php $no = 2;
                                foreach ($gambar as $gambar) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <!-- <td><?php echo $gambar->id_gambar ?></td> -->
                                        <td>
                                            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" class="img" width="60">
                                        </td>
                                        <td><?php echo $gambar->judul_gambar ?></td>
                                        <td>
                                           
                                            <a href="<?php echo base_url() . 'admin/produk/delete_gambar/' . $produk->id_produk . '/' . $gambar->id_gambar; ?>" class="btn btn-danger btn-xs" onclick="return confirm ('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash-o"></i> Hapus</a>

                                        </td>
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