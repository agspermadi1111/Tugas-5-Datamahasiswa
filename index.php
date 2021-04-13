<?php
    include 'model.php';
    $model = new Model();
    $index = 1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Mahasiswa</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
        crossorigin="anonymous">
    </head>
<body>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PEMOGRAMAN INTERNET 2</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Nilai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="absen.php">Absen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="matkul.php">Matakuliah</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontrak.php">Kontrak Mata Kuliah</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container-fluid">
        <h1>DATA NILAI MAHASISWA</h1>
        <a href="create.php"> Tambah Data</a><br>
        <a href="print.php" target="_blank">Cetak Data</a><br>
        <table class="table table-dark"> 
            <thead>
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>UAS</th>
                    <th>UTS</th>
                    <th>TUGAS</th>
                    <th>NA</th>
                    <th>STATUS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $result = $model->tampil_data();
                    if (!empty($result)) {
                        foreach ($result as $data) : ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $data->nim ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->uts ?></td>
                    <td><?= $data->uas ?></td>
                    <td><?= $data->tugas ?></td>
                    <td><?= $data->na ?></td>
                    <td><?= $data->status ?></td>
                    <td>
                        <a name="edit" id="edit" href="edit.php?nim=<?=$data->nim?>">Edit</a>
                        <a name="delete" id="delete" href="proces.php?nim=<?=$data->nim?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach;
                    }else { ?>
                <tr>
                    <td colspan="9">Belum Ada Data Pada Tabel Nilai Mahasiswa</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
</body>
</html>