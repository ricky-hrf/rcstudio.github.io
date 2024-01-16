<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}
require "functions.php";

if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "
    <script>
    alert('data berhasil ditambahkan');
    document.location.href='home.php';
    </script>
    ";
  } else {
    echo "
    <script>
    alert('data gagal ditambahkan');
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
  <title>tambah</title>
</head>

<body>
  <a href="home.php">
    <=Kembali </a>
      <br>
      <h1> Tambah data Buku</h1>
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
        <ul>
          <li><label for="judul">
              Judul Buku:</label>
            <input type="text" name="judul" id="judul" required>
          </li>
          <li>
            <label for="pengarang">
              Pengarang :</label>
            <input type="text" name="pengarang" id="pengarang" required>
          </li>
          <li>
            <label for="penerbit">
              Penerbit :</label>
            <input type="text" name="penerbit" id="penerbit" required>
          </li>
          <li>
            <label for="tahun">
              Tahun :</label>
            <input type="text" name="tahun" id="tahun" required>
          </li>
          <li>
            <label for="dimensi">
              Dimensi :</label>
            <input type="text" name="dimensi" id="dimensi" required>
          </li>
          <li>
            <label for="subjek">
              Subjek :</label>
            <input type="text" name="subjek" id="subjek" required>
          </li>
          <li>
            <label for="catatan">
              Catatan :</label>
            <input type="text" name="catatan" id="catatan" required>
          </li>
          <li>
            <label for="isbn">
              Isbn :</label>
            <input type="text" name="isbn" id="isbn" required>
          </li>
          <li>
            <label for="exemplar">
              Exemplar :</label>
            <input type="text" name="exemplar" id="exemplar" required>
          </li>
          <li>
            <label for="cover">
              Cover :</label>
            <input type="file" name="cover" id="cover">
          </li>
          <li>
            <button name="submit">Simpan</button>
          </li>
        </ul>

      </form>




</body>

</html>