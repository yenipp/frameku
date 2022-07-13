<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $user->id_pengguna ?>">
    <h4><i class="fa fa-trash-o"></i></h4>
</button>

<div class="modal fade" id="delete-<?php echo $user->id_pengguna ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title text-center">HAPUS DATA ADMIN</h4>
            </div>
            <div class="modal-body">
                <div class="callout callout-warning">
                    <h4>Yakin ingin menghapus?</h4>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                <a href="<?php echo base_url() . 'admin/user/delete/' . $user->id_pengguna; ?>" class="btn btn-danger"><i class="fa-fa-trash"></i> Hapus</a>
            </div>
        </div>
    </div>
</div>