<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome-free-5/css/all.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap" rel="stylesheet" />
  <title><?= $title ?></title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #333333">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>/assets/logo-pandam.png" alt="logo" width="60" height="65" class="d-inline-block align-text-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <!-- link from left -->
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dampak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">Kontak</a>
            </li>
          </ul>
          <!-- link from right -->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-heart"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="far fa-user"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>