<?php
    include 'model.php';
    $id = $_GET['nim'];
    $model = new Model();
    $data = $model->edit($id);
?>
<html>
    <head>
        <title>Edit Nilai Mahasiswa</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
        crossorigin="anonymous">
    </head>
<body>
        <?php
            include 'navbar.php';
        ?>
    <div class="container-fluid">
        <h1>Edit Nilai Mahasiswa</h1>
        <a href="index.php">Kembali</a>
        <br>
        <form action="proces.php" method="post">
            <div class="col-3">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" value="<?= $data->nim ?>" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label class="form-label">NAMA</label>
                    <input type="text" name="nama" value="<?= $data->nama ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">UTS</label>
                    <input type="number" name="uts" value="<?= $data->uts ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">UAS</label>
                    <input type="number" name="uas" value="<?= $data->uas ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">TUGAS</label>
                    <input type="number" name="tugas" value="<?= $data->tugas ?>" class="form-control">
                </div>
                <button type="submit" name="submit_edit" class="btn btn-success">SUBMIT</button>
                <button type="reset" class="btn btn-danger">CANCEL</button>
            </div>
        </form>
    </div>
</body>
</html>