<footer class="text-center text-lg-start text-light bg-dark">
  <div class="container-fluid p-2">
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class=" mb-4">
          Jangan lewatkan <span class="fw-bold">penawaran eksklusif</span>, rilis terbaru, dan inspirasi kami
        </h6>
        <form>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <input type="text" class="form-control rounded-pill" id="firstName" placeholder="Nama depan">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <input type="text" class="form-control rounded-pill" id="lastName" placeholder="Nama belakang">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 me-2">
              <div class="mb-3">
                <input type="email" class="form-control rounded-pill" id="email" placeholder="xxxxx@mail.com">
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <button type="submit" class="btn btn-success rounded-pill" data-mdb-ripple-color="dark">Success</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <hr class="w-100 clearfix d-md-none" />

      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
        <nav class="nav flex-column">
          <a class="nav-link text-light" href="#">Bags</a>
          <a class="nav-link text-light" href="#">Hampers</a>
          <a class="nav-link text-light" href="#">Tumblers</a>
          <a class="nav-link text-light" href="#">Binders</a>
        </nav>
      </div>

      <hr class="w-100 clearfix d-md-none" />

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
        <p><i class="fas fa-home mr-3"></i> Jl.Langenarjan Kidul No.7A, Panembahan, Kraton,
          Kota Yogyakarta, Daerah Istimewa Yogyakarta 55131</p>
        <p><i class="fas fa-envelope mr-3"></i> pandamadiwastrajanaloka@gmail.com</p>
        <p><i class="fas fa-phone mr-3"></i> +62 812-2773-357</p>
      </div>
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-2 font-weight-bold">Marketplace</h6>
        <nav class="nav flex-column">
          <a class="nav-link text-light" href="#"><img src="<?= base_url() ?>assets/tokopedia.png" alt="tokopedia" width="40px" height="40px"></a>
        </nav>
        <h6 class="text-uppercase mb-2 font-weight-bold">Social Media</h6>
        <div class="row">
          <div class="col-md-3">
            <a class="nav-link text-light" href="#"><img src="<?= base_url() ?>assets/ig.svg" alt="instagram" width="40px" height="40px"></a>
          </div>
          <div class="col-md-3">
            <a class="nav-link text-light" href="#"><img src="<?= base_url() ?>assets/facebook.svg" alt="facebook" width="40px" height="40px"></a>
          </div>
          <div class="col-md-3">
            <a class="nav-link text-light" href="#"><img src="<?= base_url() ?>assets/linkedin.svg" alt="linkedin" width="40px" height="40px"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    Copyright &copy; Pandam Adiwastra Janaloka <?php echo date("Y"); ?>
  </div>
  <!-- Copyright -->
</footer>
<!-- End of .container -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>