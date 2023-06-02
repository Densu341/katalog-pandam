<!-- edit content start here-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProductModal">Add Product</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">SubCategory</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Length</th>
                    <th scope="col">Width</th>
                    <th scope="col">Height</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Unicode</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($product as $p) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $p['subcategory_name']; ?></td>
                        <td><?= $p['product_name']; ?></td>
                        <td><?= $p['length']; ?></td>
                        <td><?= $p['width']; ?></td>
                        <td><?= $p['height']; ?></td>
                        <td><img src="<?= base_url() ?>assets/img/product/<?= $p['picture']; ?>" alt="" class="img-thumbnail" width="100"></td>
                        <td>kosong</td>
                        <td>IDR <?= number_format($p['price'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning mb-1" data-toggle="modal" data-target="#editProductModal<?= $p['product_id']; ?>"><i class="fas fa-pen fa-fw"></i></a>
                            <a href="" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#deleteProductModal" onclick="$('#deleteProductModal #formDelete').attr('action', '<?= base_url() ?>dashboard/deleteproduct/<?= $p['product_id']; ?>')"><i class="fas fa-trash fa-fw"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div> <!-- /.container-fluid -->
    <!-- end of content-->
</div>

<!-- Modal Add -->
<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProductModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('dashboard/addproduct'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <select name="sub_id" id="sub_id" class="form-control">
                        <option value="">Select SubCategory</option>
                        <?php foreach ($subcategory as $s) : ?>
                            <option value="<?= $s['sub_id']; ?>"><?= $s['subcategory_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="material_id" id="material_id" class="form-control">
                        <option value="">Select Material</option>
                        <?php foreach ($material as $data) : ?>
                            <option value="<?= $data['mat_id']; ?>"><?= $data['material_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="length" name="length" placeholder="Length">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="width" name="width" placeholder="Width">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="height" name="height" placeholder="Height">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="picture" name="picture">
                        <label class="custom-file-label" for="picture">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Rp.xxx.xxx">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<?php foreach ($product as $p) : ?>
    <div class="modal fade" id="editProductModal<?= $p['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('dashboard/editproduct/' . $p['product_id']); ?>
                <input type="hidden" name="product_id" value="<?= $p['product_id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="<?= $p['product_name']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="sub_id" id="sub_id" class="form-control">
                            <option value="">Select SubCategory</option>
                            <?php foreach ($subcategory as $s) : ?>
                                <?php if ($s['sub_id'] == $p['sub_id']) : ?>
                                    <option value="<?= $p['sub_id']; ?>" selected><?= $p['subcategory_name']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $s['sub_id']; ?>"><?= $s['subcategory_name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="length" name="length" placeholder="Length" value="<?= $p['length']; ?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="width" name="width" placeholder="Width" value="<?= $p['width']; ?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="height" name="height" placeholder="Height" value="<?= $p['height']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/product/') . $p['picture']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture">
                                        <label class="custom-file-label" for="picture">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="description" name="description" placeholder="Description"><?= $p['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Rp.xxx.xxx" value="<?= $p['price']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal Edit -->

<!-- Modal delete -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="" method="POST">
                <input type="hidden" name="product_id" value="<?= $p['product_id']; ?>">
                <div class="modal-body">
                    <p>Are you sure want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>