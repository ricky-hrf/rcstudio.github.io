<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}
require 'functions.php';

$id = $_GET["id"];

$dt = query("SELECT * FROM buku WHERE id = $id")[0];

if (isset($_POST["submit"])) {
  if (edit($_POST) > 0) {
    echo "
    <script>
    alert('data berhasil diubah');
    document.location.href='home.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal diubah');
    document.location.href='home.php';
    </script>
    ";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
</head>

<body>
  <a href="home.php">
    <=Kembali </a>
      <br>
      <h1> Edit data Buku</h1>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">

        <ul>
          <input type="hidden" name="id" value="<?= $dt["id"]; ?>">
          <input type="hidden" name="gambarLama" value="<?= $dt["cover"]; ?>">
          <li>
            <label for="judul">Judul : </label>
            <input type="text" name="judul" id="judul" value="<?= $dt["judul"]; ?>">
          </li>
          <li>
            <label for="pengarang">
              Pengarang :</label>
            <input type="text" name="pengarang" id="pengarang" value="<?= $dt["pengarang"]; ?>">
          </li>
          <li>
            <label for="penerbit">
              Penerbit :</label>
            <input type="text" name="penerbit" id="penerbit" value="<?= $dt["penerbit"]; ?>">
          </li>
          <li>
            <label for="tahun">
              Tahun :</label>
            <input type="text" name="tahun" id="tahun" value="<?= $dt["tahun"]; ?>">
          </li>
          <li>
            <label for="dimensi">
              Dimensi :</label>
            <input type="text" name="dimensi" id="dimensi" value="<?= $dt["dimensi"]; ?>">
          </li>
          <li>
            <label for="subjek">
              Subjek :</label>
            <input type="text" name="subjek" id="subjek" value="<?= $dt["subjek"]; ?>">
          </li>
          <li>
            <label for="catatan">
              Catatan :</label>
            <input type="text" name="catatan" id="catatan" value="<?= $dt["catatan"]; ?>">
          </li>
          <li>
            <label for="isbn">
              No ISBN :</label>
            <input type="text" name="isbn" id="isbn" value="<?= $dt["isbn"]; ?>">
          </li>
          <li>
            <label for="exemplar">
              Exemplar :</label>
            <input type="text" name="exemplar" id="exemplar" value="<?= $dt["exemplar"]; ?>">
          </li>
          <li>
            <label for="cover">
              Cover :</label><br>
            <img src="asset/gambar/<?= $dt['cover']; ?>" alt=""><br>
            <input type="file" name="cover" id="cover">
          </li>
        </ul>
        <li>
          <button name="submit">Simpan</button>
        </li>
      </form>




</body>

</html>