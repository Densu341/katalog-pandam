<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="banner">
                <h2><?= $category->category_name; ?></h2>
                <a href="<?= base_url('assets/product') ?>">
                    <img src="<?= base_url() ?>assets/img/category/<?= $category['banner']; ?>" alt="" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
    <div class="row row-cols-4">
        <?php foreach ($subcategory as $s) : ?>
            <div class="col justify-content-center">
                <img src="<?= base_url() ?>assets/img/subcategory/<?= $s['image']; ?>" alt="" class="img-fluid m-auto" height="100"></td>
            </div>
        <?php endforeach; ?>
    </div>
</div>