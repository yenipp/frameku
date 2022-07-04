	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/banner4.jpg">


	</section>
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Kategori Produk
						</h4>

						<ul class="p-b-54">
							<?php foreach ($listing_kategori as $listing_kategori) { ?>
								<li class="p-t-4">
									<a href="<?php echo base_url('produk/kategori/' . $listing_kategori->slug_kategori) ?>" class="s-text13 active1">
										<?php echo $listing_kategori->nama_kategori ?>
									</a>
								</li>
							<?php } ?>

						</ul>


					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!-- Product -->
					<div class="row">
						<?php foreach ($produk as $produk) { ?>
							<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

								<?php
								//Form untuk memproses belanjaan
								echo form_open(base_url('belanja/wishlist'));
								//Elemen yang dibawa
								echo form_hidden('id', $produk->id_produk);
								echo form_hidden('qty', 1);
								echo form_hidden('price', $produk->harga_produk);
								echo form_hidden('name', $produk->nama_produk);
								//Elemen redirect
								echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
								?>

								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<img src="<?php echo base_url('assets/upload/frame/' . $produk->gambar_produk) ?>" alt="<?php echo $produk->nama_produk ?>" height="200">

										<div class="block2-overlay trans-0-4">
											<!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a> -->

											<div class="block2-btn-addcart w-size1 trans-0-4">
												<div class="block2-txt p-t-150">
													<a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>" class="flex-c-m size1 s-text1 trans-0-4">
														<b>Detail produk</b>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="<?php echo base_url('produk/detail/' . $produk->slug_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
											<?php echo $produk->nama_produk ?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											IDR <?php echo number_format($produk->harga_produk, '0', ',', '.') ?>
										</span>
									</div>
									<!-- Button add to wishlist yaa-->
									<button type="submit" name="submit" value="submit" class="flex-c-m size8 bg1 bo-rad-15 hov1 s-text1 trans-0-4">
										<i class="fa fa-heart"></i>
									</button>
								</div>
								<?php
								//Closing form
								echo form_close();
								?>
							</div>
						<?php } ?>

					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26 text-center">
						<?php echo $pagin; ?>
					</div>
				</div>
			</div>
		</div>
	</section>