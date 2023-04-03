<!-- edit content start here-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubModal">Add SubCategory</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">SubCategory</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($subcategory as $s) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $s->category_name; ?></td>
                        <td><?= $s->subcategory_name; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editSubModal<?= $s->subcategory_id; ?>">Edit</a>
                            <a href="<?= base_url() ?>dashboard/delete_subcategory/<?= $s->subcategory_id; ?>" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="newSubModal" tabindex="-1" role="dialog" aria-labelledby="newSubModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubModalLabel">Add SubCategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('dashboard/add_subcategory'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <!-- select for category -->
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach ($category as $c) : ?>
                            <option value="<?= $c->category_id; ?>"><?= $c->category_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="SubCategory name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- End of Modal -->

<!-- Edit Modal -->
<?php $no = 0;
foreach ($subcategory as $s) : $no++ ?>
    <div class="modal fade" id="editSubModal<?= $s->subcategory_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubModalLabel">Edit SubCategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('dashboard/edit_subcategory'); ?>
                <div class="modal-body">
                    <input type="hidden" name="category_id" value="<?= $s->subcategory_id; ?>">
                    <div class="form-group">
                        <!-- selected category -->
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($category as $c) : ?>
                                <option value="<?= $c->category_id; ?>"><?= $c->category_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="SubCategory name" value="<?= $s->subcategory_name; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End of Modal -->