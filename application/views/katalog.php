   <section class="container-fluid">
       <!-- looping foreach category -->
       <?php foreach ($category as $c) : ?>
           <div class="row">
               <div class="col-12 text-center mb-4">
                   <a href="<?= base_url('katalog/product/') . $c['category_id']; ?>">
                       <img src="<?= base_url('assets/img/category/') . $c['banner']; ?>" alt="" class="mx-auto img-fluid">
                   </a>
               </div>
           </div>
           <div class="row justify-content-center row-cols-4">
               <?php foreach ($subcategory as $s) : ?>
                   <?php if ($s['category_id'] == $c['category_id']) : ?>
                       <div class="col text-center mb-4">
                           <div class="card bg-light border-0">
                               <img src="<?= base_url('assets/img/subcategory/') . $s['image']; ?>" alt="" class="card-img-top mx-auto">
                           </div>
                           <h4><?= $s['subcategory_name']; ?></h4>
                       </div>
                   <?php endif; ?>
               <?php endforeach; ?>
           </div>
       <?php endforeach; ?>
   </section>