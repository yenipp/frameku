	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="<?php echo base_url() ?>" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="<?php echo base_url('produk') ?>" class="s-text16">
			Produk
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $title ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" alt="<?php echo $produk->nama_produk ?>">
							</div>
						</div>

						<?php
						if ($gambar) {
							foreach ($gambar as $gambar) {
						?>
								<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/frame/' . $gambar->gambar) ?>">
									<div class="wrap-pic-w">
										<img src="<?php echo base_url('assets/upload/frame/' . $gambar->gambar) ?>" alt="<?php echo $gambar->judul_gambar ?>">
									</div>
								</div>
						<?php
							}
						}
						?>

					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h1 class="product-detail-name m-text20 p-b-13">
					<?php echo $title ?>

				</h1>

				<span class="m-text14">
					IDR <?php echo number_format($produk->harga_produk, '0', ',', '.') ?>

				</span>

				<p class="s-text3 p-t-10">
					<?php echo $produk->keterangan ?>
				</p>

				<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
				</div>
			</div>
		</div>
	</div>