        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <!-- <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p> -->
                <p>Optik Wijaya Kusuma 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <script src="<?php echo base_url() ?>assets/admin/plugins/common/common.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/js/custom.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/js/settings.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/js/gleek.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/js/styleSwitcher.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/./plugins/tables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

        <script src="<?= base_url() ?>assets/admin/plugins/leaflet/leaflet.js"></script>
        <script src="<?= base_url() ?>assets/admin/pages/jquery.leaflet-map.init.js"></script>

        <script>
            function bacaGambar(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#gambar_load').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#preview_gambar').change(function() {
                bacaGambar(this);
            });

            function bacaGambarFrame(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#gambar_load_frame').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#preview_gambar_frame').change(function() {
                bacaGambarFrame(this);
            });
        </script>

        </body>

        </html>