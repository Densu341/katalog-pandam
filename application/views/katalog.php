<div class="container">
    <div class="row">
        <div class="col-12">
            <?php foreach ($category as $c) : ?>
                <hr>
                <div class="banner text-center">
                    <h2 class="text-center m-5"><?= $c['category_name']; ?></h2>
                    <a href="<?= base_url('assets/product') ?>">
                        <img src="<?= base_url() ?>assets/img/category/<?= $c['banner']; ?>" alt="" class="img-thumbnail rounded m-5">
                    </a>
                    <div class="row row-cols-4 mt-4 justify-content-center">
                        <?php
                        foreach ($subcategory as $sub) :
                            if ($sub['category_name'] == $c['category_name']) :
                        ?>
                                <div class="col justify-content-center">
                                    <div class="card">
                                        <img src="<?= base_url() ?>assets/img/subcategory/<?= $sub['image']; ?>" alt="" class="img-fluid m-auto" height="100">
                                        <p><?= $sub['subcategory_name']; ?></p>
                                    </div>
                                </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>