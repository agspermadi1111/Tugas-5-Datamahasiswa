<?php
    include 'model.php';
    $model = new Model();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
    crossorigin="anonymous">

    <title>ABSEN</title>
</head>
<body>
       
    <div class="container-fluid">
    <h1>Tambah</h1>
    <a href="absen.php">Kembali</a>
    <br><br>
        <form action="proces.php" method="post">
            <div class="col-3">
                <div class="mb-3">
                    <label class="form=label">NAMA MAHASISWA</label>
                    <select name="nama" class="form-select">
                        <?php
                            $result = $model->tampil_mhs();
                            if (!empty($result)) {
                                foreach ($result as $data) : ?>
                        <option value="<?= $data->id ?>"><?=$data->nama?></option>
                        <?php endforeach; } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form=label">MATAKULIAH</label>
                    <select name="matkul" class="form-select">
                        <?php
                            $result = $model->tampil_matkul();
                            if (!empty($result)) {
                                foreach ($result as $data) : ?>
                        <option value="<?= $data->id ?>"><?=$data->nama_mk?></option>
                        <?php endforeach; } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">WAKTU / JAM</label>
                    <input type="time" name="jam" class="form-control timepicker">
                </div>

                <button type="submit" name="submit_absen" >SUBMIT</button>
                <button type="reset">CANCEL</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
</body>
</html>