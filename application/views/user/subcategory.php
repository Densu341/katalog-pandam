  <section class="container-fluid">
    <div class="row align-items-center mb-2">
      <div class="col-md-1 col-sm-1">
        <img src="<?= base_url() ?>/assets/icon/Arrow - Left.svg" alt="" class="img-fluid" />
      </div>
      <div class="col-md-10 col-sm-10">
        <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <div class="sub-image text-center">
            <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" alt="" class="img-thumb" />
          </div>
        </a>
      </div>
      <div class="col-md-1 col-sm-1">
        <img src="<?= base_url() ?>/assets/icon/Arrow - Right.svg" alt="" class="img-fluid" />
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-1" style="background-color: #d9d9d9">
                <!-- icon sidebar -->
                <div class="row">
                  <div class="col-md-12 text-center mt-3">
                    <a href="#">
                      <img src="<?= base_url() ?>/assets/logo-pandam-2.png" alt="" class="img-fluid" />
                    </a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12 text-center">
                    <a href="#">
                      <i class="fas fa-home fa-lg" style="color: #333333"></i>
                    </a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12 text-center">
                    <a href="#">
                      <i class="far fa-heart fa-lg" style="color: #333333"></i>
                    </a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12 text-center">
                    <a href="#">
                      <i class="fas fa-share-alt fa-lg" style="color: #333333"></i>
                    </a>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-12 text-center">
                    <a href="#">
                      <i class="fas fa-file-download fa-lg" style="color: #333333"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <img src="<?= base_url() ?>/assets/img/product/Wiguna_Totebag.png" alt="" class="h-100 w-100" />
                </div>
              </div>
              <div class="col-md-4">
                <h2 class="text-center">The Name of Product</h2>
              </div>
              <div class="col-md-1">
                <img src="<?= base_url() ?>/assets/icon/Arrow - Right.svg" alt="" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>