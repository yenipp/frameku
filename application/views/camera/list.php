<!DOCTYPE html>
<html>

<head>
    <!-- <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            padding: 10px;
            border: 1px solid;
            background: #ccc;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <div class="container mt-5">
        <!-- <h1 class="text-center">Capture webcam image with php and jquery - ItSolutionStuff.com</h1> -->

        <form method="POST" action="storeImage.php">
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera" class="w-100" style="background-color: grey;"></div>
                    <br />
                    <img src="<?php echo base_url('assets/upload/image/noface.png') ?>" alt="" style="position:absolute; top:70px;left:70px; width: 375px; height: auto; ">

                    <!-- <img src="<?php echo base_url('assets/upload/watermark3.png') ?>" alt="" style="margin-top: -470px; margin-left:170px; width: 180px; height: auto;"> -->
                    <div class="d-flex justify-content-between">
                        <input type=button class="btn btn-success" value="Take Snapshot" onClick="take_snapshot()">
                        <select name="" id="frame" class="form-select w-25" onchange="myFunction()">
                            <option value="">Pilih Frame Kacamata</option>
                            <?php foreach ($daftar_frame as $df) { ?>
                                <option value="<?= $df['gambar_frame'] ?>"><?= $df['nama_produk'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6">
                    <div id="results"></div>
                    <img src="" alt="" id="frame-gambar" style="margin-top: -450px; margin-left:170px; width: 180px; height: auto;">


                </div>
                <div class="col-md-12 text-center">
                    <br />
                    <!-- <button class="btn btn-success">Submit</button> -->
                </div>
            </div>
        </form>
    </div>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true
        });

        Webcam.attach('#my_camera');

        function myFunction() {
            document.getElementById("frame-gambar").src = "http://localhost/frameku/assets/upload/frame/" + $("#frame").val();
            console.log();
        }

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
    <script>
        $(document).ready(function() {

            $('#frame-gambar').src = '<?= base_url('assets/upload/watermark3.png') ?>'
        });
    </script>
</body>

</html>