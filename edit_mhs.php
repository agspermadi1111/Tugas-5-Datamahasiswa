<?php
    include 'model.php';
    $id = $_GET['id'];
    $model = new Model();
    $data = $model->editmhs($id);
?>
<html>
    <head>
        <title>TAMBAH DATA NILAI</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
        crossorigin="anonymous">
    </head>
<Body>
        <?php
            include 'navbar.php';
        ?>
    <div class="container-fluid">
    <h1>Tambah</h1>
    <a href="mahasiswa.php">Kembali</a>
    <br><br>
        <form action="proces.php" method="post">
        <div class="col-3">
            <div class="mb-3">
                <label class="form=label">NAMA</label>
                <input type="hidden" value="<?= $data->id?>" name="id">
                <input type="text" name="nama" value="<?= $data->nama?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">SEMESTER</label>
                <input type="number" name="semester" value="<?= $data->semester?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">ALAMAT</label>
                <textarea name="alamat"  class="form-control"><?= $data->alamat?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">NO.TELP</label>
                <input type="text" name="telp" value="<?= $data->no_tlp?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">EMAIL</label>
                <input type="email" name="email" value="<?= $data->email?>" class="form-control">
            </div>

            <button type="submit" name="edit_mhs" class="btn btn-success">SUBMIT</button>
            <button type="reset" class="btn btn-danger">CANCEL</button>
        </div>
        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
</Body>
</html>