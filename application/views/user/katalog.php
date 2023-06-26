<section>
  <?php foreach ($category as $data) : ?>
  <a href="<?= base_url('katalog/show_subCategory/') . $data['category_id'] ?>">
    <div class="container card">
      <div class="col justify-content-md-center mt-1">
        <img src="<?= base_url() ?>/assets/img/category/<?= $data['banner'] ?>" alt=""
          class="w-100 img-fluid rounded-3" />
      </div>
      <div class="subcategory rounded-3">
        <h3 class="m-3 mb-1">Sub Category</h3>
        <div class="row m-1">
          <?php foreach ($subcategory as $value): ?>
          <?php if ($value["category_name"] == $data['category_name']) :?>
          <div class="col-3">
            <div class="card rounded">
              <img src="<?= base_url() ?>/assets/img/subcategory/<?= $value['image']?>" class="card-img-top" alt="">
              <div class="card-body">
                <p class="card-text text-center"><?= $value['subcategory_name'] ?></p>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </a>
  <?php endforeach;?>
</section>