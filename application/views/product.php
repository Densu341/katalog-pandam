<div class="container">
    <div class="row">
        <h2>Feature Product</h2>
    </div>
    <div class="row">
        <?php foreach ($product as $p) : ?>
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card border-0 mb-4">
                    <div class="card-header position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid" src="<?= base_url() ?>assets/img/product/<?= $p['picture']; ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?= $p['product_name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>Rp. <?= number_format($p['price'], 0, ',', '.'); ?></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>