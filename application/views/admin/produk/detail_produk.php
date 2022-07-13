<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="col-lg-12">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DETAIL DATA</h4>
                        <br>
                        <div class="basic-form">

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">
                                    <th>
                                        <h5>ID Frame</h5>
                                    </th>
                                </label>
                                <div class="col-lg-8">
                                    <td>
                                        <h5><?php echo $produk->id_produk ?></h5>
                                    </td>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">
                                    <th>
                                        <h5>Kode Frame</h5>
                                    </th>
                                </label>
                                <div class="col-lg-8">
                                    <td>
                                        <h5><?php echo $produk->kode_produk ?></h5>
                                    </td>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">
                                    <th>
                                        <h5>Nama Produk</h5>
                                    </th>
                                </label>
                                <div class="col-lg-7">
                                    <td>
                                        <h5><?php echo $produk->nama_produk ?></h5>
                                    </td>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">
                                    <th>
                                        <h5>Gambar</h5>
                                    </th>
                                </label>
                                <div class="col-lg-8">
                                    <td>
                                        <a href="<?php echo $produk->id_produk ?>">
                                            <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" class="img" width="400">
                                        </a>
                                    </td>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">
                                    <th>
                                        <h5>Keterangan Frame</h5>
                                    </th>
                                </label>
                                <div class="col-lg-7">
                                    <td>
                                        <h6><?php echo $produk->keterangan ?></h6>
                                    </td>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">
                                    <th>
                                        <h5>Harga Produk</h5>
                                    </th>
                                </label>
                                <div class="col-lg-7">
                                    <td>
                                        <h5><?php echo number_format($produk->harga_produk, '0', ',', '.') ?></h5>
                                    </td>
                                </div>
                            </div>

                            <table class="table">
                                <!-- <tr>
                                    <th>
                                        <h5>ID Produk</h5>
                                    </th>
                                    <td><?php echo $produk->id_produk ?></td>
                                </tr> -->
                                <!-- <tr>
                                    <th>
                                        <h5>Kode Produk</h5>
                                    </th>
                                    <td><?php echo $produk->kode_produk ?></td>
                                </tr> -->
                                <!-- <tr>
                                    <th>
                                        <h5>Gambar <?php echo $produk->nama_produk ?></h5>
                                    </th>
                                    <td>
                                        <a href="<?php echo $produk->id_produk ?>">
                                            <img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" class="img" width="400">
                                        </a>
                                    </td>
                                </tr> -->
                                <!-- <tr>
                                    <th>
                                        <h5>Keterangan Produk</h5>
                                    </th>
                                    <td><?php echo $produk->keterangan ?></td>
                                </tr> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>