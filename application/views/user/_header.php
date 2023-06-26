<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome-free-5/css/all.css">
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700&display=swap"
      rel="stylesheet"
    />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <title><?= $title ?></title>
</head>

<body class="container-fluid" style="background: #F2F2F2;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2 fixed-top bg-opacity-75">
    <div class="container-fluid mx-4">
      <img src="<?= base_url() ?>/assets/favicon.png" alt="" class="navbar-brand opacity-100" height="80">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
          <li class="nav-item mx-2">
            <a class="nav-link active fs-5" aria-current="page" href="<?= base_url(); ?>">Home</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link fs-5" aria-current="page" href="#">About Us</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link fs-5" href="#">Contact</a>
          </li>
        </ul>
        <div class="d-flex">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#"><i class="far fa-heart fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-shopping-cart fa-lg"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-fluid bg-transparent">
    <div style="height: 96px;"></div>
  </div>