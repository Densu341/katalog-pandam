<section class="container-fluid">
  <div id="subcategoryCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-bs-target="#subcategoryCarousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#subcategoryCarousel" data-bs-slide-to="1"></li>
      <li data-bs-target="#subcategoryCarousel" data-bs-slide-to="2"></li>
      <!-- Add more indicators if needed -->
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row align-items-center mb-2 py-2">
          <div class="col-md-6 mx-auto">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <div class="sub-image text-center">
                <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" alt="" class="img-fluid rounded" />
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <!-- Add content for the second slide -->
        <div class="row align-items-center mb-2 py-2">
          <div class="col-md-6 mx-auto">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <div class="sub-image text-center">
                <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" alt="" class="img-fluid rounded" />
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <!-- Add content for the third slide -->
        <div class="row align-items-center mb-2 py-2">
          <div class="col-md-6 mx-auto">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <div class="sub-image text-center">
                <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" alt="" class="img-fluid rounded" />
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Add more slides if needed -->
    </div>

    <!-- Controls -->
    <a class="carousel-control-prev control-color" href="#subcategoryCarousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next control-color" href="#subcategoryCarousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>



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
              <div class="col-md-1 my-auto">
                <a type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span><i class="fas fa-chevron-left"></i></span>
                </a>
              </div>

              <div class="col-md-9">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      <div class="row">
                        <div class="col my-auto">
                          <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="col">
                          <h3>WIGUNA Tote Bags mix Shibori</h3>
                          <p>by Pandam</p>
                          <h6>Product Code</h6>
                          <h6>Material</h6>
                          <h6>Size</h6>
                          <h6>Price</h6>
                          <h6>Description</h6>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?
                          </p>

                        </div>
                      </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                      <div class="row">
                        <div class="col my-auto">
                          <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="col">
                          <h3>WIGUNA Tote Bags mix Shibori</h3>
                          <p>by Pandam</p>
                          <h6>Product Code</h6>
                          <h6>Material</h6>
                          <h6>Size</h6>
                          <h6>Price</h6>
                          <h6>Description</h6>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?
                          </p>

                        </div>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="row">
                        <div class="col my-auto">
                          <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg" class="d-block w-100" alt="..." />
                        </div>
                        <div class="col">
                          <h3>WIGUNA Tote Bags mix Shibori</h3>
                          <p>by Pandam</p>
                          <h6>Product Code</h6>
                          <h6>Material</h6>
                          <h6>Size</h6>
                          <h6>Price</h6>
                          <h6>Description</h6>
                          <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate? Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe provident natus vel?
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1 my-auto">
                <a type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span><i class="fas fa-chevron-right"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>