<section class="container-fluid">
  <?php foreach ($subCategory as $value) : ?>
  <div class="row d-flex justify-content-center">
    <h2 class=" text-center"><?= $value['subcategory_name'] ?></h2>
    <?php foreach ($product as $data) : ?>
    <?php if ($data['sub_id'] == $value['sub_id']) : ?>
    <div class="card col-4 mt-1 style=" width: 18rem;"">
      <img src="<?= base_url() ?>/assets/img/product/<?= $data['picture'] ?>" class="card-img-top img-thumbnail"
        alt="...">
      <div class=" card-body">
        <h5 class="card-title"><?= $data['product_name'] ?></h5>
        <p class="card-text"><?= substr($data['description'], 0, 30) ?> ... </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <br>
  </div>
  <?php endforeach; ?>

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
                          <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg"
                            class="d-block w-100" alt="..." />
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
                          <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg"
                            class="d-block w-100" alt="..." />
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
                          <img src="<?= base_url() ?>/assets/static/WIGUNA_ToteBags_mix_Shibori.jpeg"
                            class="d-block w-100" alt="..." />
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
</section>