<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}
require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPerHalaman = 20;
$jumlahData = count(query("SELECT * FROM buku"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$buku = query("SELECT * FROM buku ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

if (isset($_POST["cari"])) {
  $buku = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- my css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-1+jQxaUgOp9J1dB23drUZm8Gr6blzplb1uYXPxk0dp5hW26RzgI9bp+YrtyOh23INuvdWJ7I5yAcYbMxYX4b1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .loader {
      width: 100px;
      position: absolute;
      top: 128px;
      z-index: -1;
      display: none;
    }

    @media print {

      .logout,
      .tambah,
      .cari {
        display: none;
      }
    }
  </style>

  <script src="asset/style/jquery-3.7.1.min.js"></script>
  <script src="asset/style/script.js"></script>

</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top" style=" 
  background-color: #120b47;">
    <div class="container">
      <a class="navbar-brand" href="#home"><span class="fw-bold">Rc</span>Studio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Project
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="buku.php">Daftar Buku</a></li>
              <li><a class="dropdown-item" href="#project">Machine Learning</a></li>
              <li><a class="dropdown-item" href="#project">Deep Learning</a></li>
              <li><a class="dropdown-item" href="#project">Jaringan Syaraf Tiruan</a></li>
              <li><a class="dropdown-item" href="#project">Pemrograman Mobile</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <section>
    <!-- tabel -->
    <div class="container">
      <h2 class="text-center mb-4">Daftar Buku Bacaan</h2>
      <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="cari di sini...." autocomplete="off" id="keyword" class="cari mb-4">
        <button type="submit" name="cari" id="tombol-cari" class="cari">Search</button>
        <img src="asset/gambar/loader.gif" class="loader">
      </form>
      <!-- tombol tambah data -->
      <button class="btn  btn-dark mb-3 btn-hover" style="background-color: #120b47;"><a href="tambah.php" style="text-decoration: none; color: white">Tambah data</a></button>
      <br>
      <?php if ($halamanAktif > 1) : ?>
        <a href="?page=<?= $halamanAktif - 1; ?>">&laquo;</a>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
          <a href="?page=<?= $i; ?>" style="font-weight: bold; color:blue;"><?= $i; ?></a>
        <?php else : ?>
          <a href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?page=<?= $halamanAktif + 1; ?>">&raquo;</a>
      <?php endif; ?>
      <br>
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">cover</th>
            <th scope="col">Action</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Tahun</th>
            <th scope="col">Dimensi</th>
            <th scope="col">Subjek</th>
            <th scope="col">Catatan</th>
            <th scope="col">No ISBN</th>
            <th scope="col">Exemplar</th>
          </tr>
        </thead>
        <?php if (empty($buku)) : ?>
          <tr>
            <td colspan="12">
              <p>
                Data tidak ditemukan..!
              </p>
            </td>
          </tr>
        <?php endif; ?>
        <?php $i = 1; ?>
        <?php foreach ($buku as $row) : ?>
          <tr>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <img src="asset/gambar/<?= $row["cover"]; ?>" style="width:100px; height:100px">
            </td>
            <td>
              <button><a href="edit.php?id=<?= $row["id"]; ?>">Edit</a></button>
              <button><a href="delete.php?id= <?= $row["id"]; ?>">Delete</a></button>
            </td>
            <td><?= $row["judul"] ?></td>
            <td><?= $row["pengarang"] ?></td>
            <td><?= $row["penerbit"] ?></td>
            <td><?= $row["tahun"] ?></td>
            <td><?= $row["dimensi"] ?></td>
            <td><?= $row["subjek"] ?></td>
            <td><?= $row["catatan"] ?></td>
            <td><?= $row["isbn"] ?></td>
            <td><?= $row["exemplar"] ?></td>

          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>

      </table>
    </div>
    <!-- akhir tabel -->
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-Kfk2opopL3KJ6I+MZZOdXgI6/BBe8hSv2gWPSc6FmND13lMR0wknLo6a8Qq6pVX+fNCerffHhTR4PUbQG5Vl+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>