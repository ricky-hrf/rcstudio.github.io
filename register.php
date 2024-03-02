<?php
require "functions.php";

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "
    <script>
    alert('Anda berhasil mendaftar!');
    document.location.href='login.php';
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>

  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


  <!-- my css -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!-- register -->

  <section id="register">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>Registrasi</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-4">
          <form action="" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
              <label for="password2" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password2" name="password2" required>
            </div>
            <button type="submit" name="register" class="btn btn-dark" style="background-color: #120b47;">Register</button>
          </form>
          <a class="dropdown-item fw-bold mt-auto" href="login.php">Login!</a>

        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#120b47" fill-opacity="1" d="M0,0L60,26.7C120,53,240,107,360,112C480,117,600,75,720,90.7C840,107,960,181,1080,181.3C1200,181,1320,107,1380,69.3L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
  </section>

  <!-- akhir register -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>