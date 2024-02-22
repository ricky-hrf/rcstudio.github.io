<?php
$conn = mysqli_connect("localhost", "root", "", "kuliah");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;
  $judul = htmlspecialchars($data["judul"]);
  $pengarang = htmlspecialchars($data["pengarang"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $tahun = htmlspecialchars($data["tahun"]);
  $dimensi = htmlspecialchars($data["dimensi"]);
  $subjek = htmlspecialchars($data["subjek"]);
  $catatan = htmlspecialchars($data["catatan"]);
  $isbn = htmlspecialchars($data["isbn"]);
  $exemplar = htmlspecialchars($data["exemplar"]);

  $cover = upload();
  if (!$cover) {
    return false;
  }

  $query = "INSERT INTO buku VALUES (
    '',
    '$judul',
    '$pengarang',
    '$penerbit',
    '$tahun',
    '$dimensi',
    '$subjek',
    '$catatan',
    '$isbn',
    '$exemplar',
    '$cover'
  )";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}


function upload()
{
  $namaFile = $_FILES['cover']['name'];
  $ukuranFile = $_FILES['cover']['size'];
  $error = $_FILES['cover']['error'];
  $tmpName = $_FILES['cover']['tmp_name'];

  if ($error === 4) {
    echo "
    <script>alert('Tambahkan cover!')</script>";
    return false;
  }
  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
    <script>alert('Mau kau apa bang!')</script>";
    return false;
  }
  //cek jika ukuran terlalu besar
  if ($ukuranFile > 1000000) {
    echo "<script>
    alert('kegedean gambarnya bang!')
    </script>";
    return false;
  }
  //upload gambar
  //generate nama baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'asset/gambar/' . $namaFileBaru);
  return $namaFileBaru;
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function edit($data)
{
  global $conn;
  $id = $data["id"];
  $judul = htmlspecialchars($data["judul"]);
  $pengarang = htmlspecialchars($data["pengarang"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $tahun = htmlspecialchars($data["tahun"]);
  $dimensi = htmlspecialchars($data["dimensi"]);
  $subjek = htmlspecialchars($data["subjek"]);
  $catatan = htmlspecialchars($data["catatan"]);
  $isbn = htmlspecialchars($data["isbn"]);
  $exemplar = htmlspecialchars($data["exemplar"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);
  //cek apakah ada gambar baru
  if ($_FILES['cover']['error'] === 4) {
    $cover = $gambarLama;
  } else {
    $cover = upload();
  }

  $query = "UPDATE buku SET 
            judul = '$judul',
            pengarang = '$pengarang',
            penerbit = '$penerbit',
            tahun = '$tahun',
            dimensi = '$dimensi',
            subjek = '$subjek',
            catatan = '$catatan',
            isbn = '$isbn',
            exemplar = '$exemplar',
            cover = '$cover'
            
            WHERE id = $id
            ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{

  $query = " SELECT * FROM buku WHERE judul LIKE '%$keyword%' OR 
  pengarang LIKE '%$keyword%' OR
  penerbit LIKE '%$keyword%' OR
  tahun LIKE '%$keyword%'
  ";

  return query($query);
}

function register($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $email = htmlspecialchars(strtolower($data["email"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  //cek username
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('username sudah dipakai..!');
    </script>
    ";
    return false;
  }

  // mengecek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
    alert('konfirmasi password tidak sesuai');
    </script>
    ";
    return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan data ke database
  mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password', '$email')");

  return mysqli_affected_rows($conn);
}
