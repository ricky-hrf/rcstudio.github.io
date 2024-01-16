<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Portofolio</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- my css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- icon -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- js -->
  <script src="asset/style/script.js" defer></script>
</head>

<body id="home">
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
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#project">Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
        <div class="button ms-auto">
          <a href="login.php" class="btn btn-light" role="button">Login</a>
          <a href="register.php" class="btn btn-outline-light btn-padding-y-sm" role="button">Register</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- jumbotron -->
  <section class="jumbotron text-center">
    <img src="asset/gambar/profil.jpg" alt="profil" width="200" class="rounded-circle img-thumbnail">
    <h1 class="display-4 fw-bold">Ricky Harefa</h1>
    <p class="lead">I'm a Developer & designer</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1" d="M0,0L60,26.7C120,53,240,107,360,112C480,117,600,75,720,90.7C840,107,960,181,1080,181.3C1200,181,1320,107,1380,69.3L1440,32L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir jumbotron -->

  <!-- about -->
  <section id="about">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>About Me</h2>
        </div>
      </div>
      <div class="row justify-content-center fs-5 text-center">
        <div class="col-md-4 mb-3">
          <p>Hai, Saya Ricky Harefa, seorang mahasiswa informatika dan penikmat seni koding. Dengan semangat petualangan, saya berupaya menciptakan pengalaman online yang tak terlupakan</p>
        </div>
        <div class="col-md-4 mb-3">
          <p>Saya tidak pernah berhenti berimajinasi, selalu siap menghadirkan inovasi dalam dunia desain web. Bersiaplah untuk menjelajahi bersama saya ke dimensi baru di dunia digital yang tak terbatas!</p>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#e4e4ee" fill-opacity="1" d="M0,288L48,245.3C96,203,192,117,288,112C384,107,480,181,576,218.7C672,256,768,256,864,234.7C960,213,1056,171,1152,170.7C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir about -->

  <!-- project -->
  <section id="project">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>My Project</h2>
        </div>
      </div>
      <div class="row justify-content-evenly">
        <div class="col-md-4 mb-3">
          <div class="card">
            <a href="login.php">
              <img src="asset/gambar/1.jpg" height="250" class="card-img-top" alt="project1">
            </a>
            <div class="card-body">
              <p class="card-text text-center">Pemrograman Web</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="asset/gambar/2.jpg" height="250" class="card-img-top" alt="project2">
            <div class="card-body">
              <p class="card-text text-center">Machine Learning</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="asset/gambar/5.jpg" height="250" class="card-img-top" alt="project3">
            <div class="card-body">
              <p class="card-text text-center">Deep Learning</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="asset/gambar/4.jpg" height="250" class="card-img-top" alt="project4">
            <div class="card-body">
              <p class="card-text text-center">Jaringan Syaraf Tiruan</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card">
            <img src="asset/gambar/3.jpg" height="250" class="card-img-top" alt="project5">
            <div class="card-body">
              <p class="card-text text-center">Pemrograman mobile</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1" d="M0,192L40,181.3C80,171,160,149,240,128C320,107,400,85,480,106.7C560,128,640,192,720,186.7C800,181,880,107,960,106.7C1040,107,1120,181,1200,192C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
    </svg>
  </section>

  <!-- akhir project -->

  <!-- contact -->
  <section id="contact">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col">
          <h2>Contact Me</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
              <label for="pesan" class="form-label">Pesan</label>
              <textarea class="form-control" id="pesan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#120b47" fill-opacity="1" d="M0,288L48,245.3C96,203,192,117,288,112C384,107,480,181,576,218.7C672,256,768,256,864,234.7C960,213,1056,171,1152,170.7C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <!-- akhir contact -->

  <!-- footer -->
  <footer class="text-white text-center p-5">
    <p>Created with love by <a href="https://www.instagram.com/rickyomasio/" class="text-white fw-bold">Ricky Harefa</a></p>
  </footer>
  <!-- akhir footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>