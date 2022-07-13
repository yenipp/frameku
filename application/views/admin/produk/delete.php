<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $produk->id_produk ?>">
	<h4><i class="fa fa-trash-o"></i></h4>
</button>

<div class="modal fade" id="delete-<?php echo $produk->id_produk ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<!-- <span aria-hidden="true">&times;</span> -->
				</button>
				<h4 class="modal-title text-center">HAPUS DATA PRODUK</h4>
			</div>
			<div class="modal-body">
				<div class="callout callout-warning">
					<h4>Yakin ingin menghapus?</h4>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
				<a href="<?php echo base_url() . 'admin/produk/delete/' . $produk->id_produk; ?>" class="btn btn-danger"><i class="fa-fa-trash"></i> Hapus</a>
			</div>
		</div>
	</div>
</div>