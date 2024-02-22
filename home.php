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
      <a class="navbar-brand" href="home.php"><span class="fw-bold">Rc</span>Studio</a>
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
    <a href="logout.php" class="logout">
      <=Keluar </a>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-Kfk2opopL3KJ6I+MZZOdXgI6/BBe8hSv2gWPSc6FmND13lMR0wknLo6a8Qq6pVX+fNCerffHhTR4PUbQG5Vl+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>