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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubModal">Add SubCategory</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">SubCategory</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($subcategory as $s) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $s['subcategory_name']; ?></td>
                        <td><?= $s['category_name']; ?></td>
                        <td><img src="<?= base_url() ?>assets/img/subcategory/<?= $s['image']; ?>" alt="" class="img-thumbnail" width="100"></td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editSubModal<?= $s['sub_id']; ?>"><i class="fas fa-pen"></i></a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteSubModal" onclick="$('#deleteSubModal #formDelete').attr('action', '<?= base_url() ?>dashboard/deletesubcategory/<?= $s['sub_id']; ?>')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div> <!-- /.container-fluid -->
    <!-- end of content-->
</div>

<!-- Modal Add -->
<div class="modal fade" id="newSubModal" tabindex="-1" role="dialog" aria-labelledby="newSubModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubModalLabel">Add SubCategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('dashboard/addsubcategory'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Subcategory Name">
                </div>
                <div class="form-group">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach ($category as $c) : ?>
                            <option value="<?= $c['category_id']; ?>"><?= $c['category_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Add Image</label>
                    </div>
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
<?php foreach ($subcategory as $s) : ?>
    <div class="modal fade" id="editSubModal<?= $s['sub_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubModalLabel">Edit Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('dashboard/editsubcategory/' . $s['sub_id']); ?>
                <input type="hidden" name="sub_id" value="<?= $s['sub_id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Subcategory Name" value="<?= $s['subcategory_name']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($category as $c) : ?>
                                <?php if ($c['category_id'] == $s['category_id']) : ?>
                                    <option value="<?= $s['category_id']; ?>" selected><?= $s['category_name']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $c['category_id']; ?>"><?= $c['category_name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/subcategory/') . $s['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<div class="modal fade" id="deleteSubModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSubModalLabel">Delete SubCategory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="" method="POST">
                <input type="hidden" name="sub_id" value="<?= $s['sub_id']; ?>">
                <div class="modal-body">
                    <p>Are you sure want to delete this subcategory?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal -->