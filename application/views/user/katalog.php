<section style="border: none;">
  <?php foreach ($category as $data) : ?>
    <a href="<?= base_url('katalog/show_subCategory/') . $data['category_id'] ?>" class="text-decoration-none">
      <div class="container-fluid card" style="background-color: #f2f2f2; border: none;">
        <img src="<?= base_url() ?>/assets/img/category/<?= $data['banner'] ?>" alt="" class="w-100 img-fluid rounded-3" />
        <div class="subcategory rounded-3" style="background-color: #c8e6c9; border: none;">
          <div class="row justify-content-center m-1">
            <?php foreach ($subcategory as $value) : ?>
              <?php if ($value["category_name"] == $data['category_name']) : ?>
                <div class="col-3 d-flex my-2">
                  <div class="card flex-fill rounded bg-transparent" style="border: none;">
                    <div class="ratio-container">
                      <img src="<?= base_url() ?>/assets/img/subcategory/<?= $value['image'] ?>" class="card-img-top ratio-content" alt="">
                    </div>
                    <div class="card-body d-none d-md-block text-center">
                      <p class="card-text  text-dark "><?= $value['subcategory_name'] ?></p>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach; ?>
</section>