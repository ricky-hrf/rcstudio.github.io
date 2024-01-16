<?php
session_start();
require "functions.php";


//cek coockie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  //ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("location: home.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  //cek username
  if (mysqli_num_rows($result) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //cek session
      $_SESSION["login"] = true;

      //cek remember me
      if (isset($_POST['remember'])) {
        //buat coockie
        setcookie('id', $row['id'], time() + 100);
        setcookie('key', hash('sha256', $row['username']), time() + 100);
      }
      header("location: home.php");
      exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- my css -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!-- login -->
  <section>
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2 class="mb-3">Login</h2>
          <?php if (isset($error)) : ?>
            <p>username / password wrong</p>
          <?php endif; ?>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4">
          <form action="" method="post">
            <div class="mb-3">
              <input type="text" name="username" class="form-control" placeholder="username" required>
            </div>
            <div class="mb-3">
              <div class="form-check">

              </div>
              <input type="password" class="form-control" name="password" placeholder="password" required>
            </div>
            <div class="remember mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck" name="remember">
                <label class="form-check-label" for="dropdownCheck">
                  Remember me
                </label>
              </div>
            </div>
            <button type="submit" name="login" class="btn btn-dark mb-3" style="background-color: #120b47;">Login!</button>
          </form>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item fw-bold" href="register.php">New around here? Sign up</a>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#120b47" fill-opacity="1" d="M0,288L48,245.3C96,203,192,117,288,112C384,107,480,181,576,218.7C672,256,768,256,864,234.7C960,213,1056,171,1152,170.7C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir login -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>