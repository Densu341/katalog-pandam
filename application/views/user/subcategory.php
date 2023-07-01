
<section class="container-fluid pt-2">
  <?php foreach ($subcategory as $s) : ?>
    <div id="<?= $s['sub_code'] ?>" class="carousel slide" data-bs-ride="carousel">
      <!-- Slides -->
      <div class="carousel-inner">
        <?php $firstItem = true; ?>
        <?php foreach ($products as $p) : ?>
          <?php if ($p['sub_id'] == $s['sub_id']) : ?>
            <div class="carousel-item 
            <?php if ($firstItem) {
              echo 'active';
              $firstItem = false;
            } ?>">
              <div class="row align-items-center mb-2 py-2">
                <div class="col-md-6 mx-auto">
                  <div class="sub-image text-center">
                    <img src="<?= base_url() ?>/assets/img/product/<?= $p['picture'] ?>" alt="" class="img-fluid rounded" />
                    <div class="container d-flex justify-content-center mt-2">
                      <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#product" data-bs-sub="<?= $p['sub_id']; ?>" data-bs-name="<?= $s['subcategory_name'] ?>"> Show Product Details </button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          <?php endif; ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Controls -->
      <?php if ($firstItem == false) : ?>
        <a class="carousel-control-prev control-color" href="#<?= $s['sub_code'] ?>" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next control-color" href="#<?= $s['sub_code'] ?>" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      <?php endif; ?>
    </div>
    <!-- button open modal per subcategory -->
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="text-end">
          <!-- <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#product" data-bs-sub="<?= $product['sub_id']; ?>" data-bs-name="<?= $s['subcategory_name'] ?>">
          </button> -->
        </div>
      </div>
    </div>
    <!-- divider -->
    <div class="row">
      <div class="col-md-12">
        <hr class="my-5" />
      </div>
    </div>
  <?php endforeach; ?>
</section>


<!-- Modal -->
<div class="modal fade" id="product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-1" style="background-color: #d9d9d9">
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
            <div class="col-md-1 my-auto col-sm-1 col-1">
              <a type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span><i class="fas fa-chevron-left"></i></span>
              </a>
            </div>

            <div class="col-md-9 col-sm-9 col-9">
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
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi
                          fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate?
                          Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio
                          architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe
                          provident natus vel?
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
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi
                          fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate?
                          Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio
                          architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe
                          provident natus vel?
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
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laborum excepturi
                          fugiat iusto sapiente minus, repellendus sed, quia cupiditate, unde quaerat eum voluptate?
                          Dolorem eius, dicta hic nihil tenetur voluptas maiores quos nesciunt impedit, distinctio
                          architecto fuga dolor optio veritatis beatae molestiae minima? Ipsa mollitia, earum saepe
                          provident natus vel?
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-1 my-auto col-sm-1 col-1">
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
