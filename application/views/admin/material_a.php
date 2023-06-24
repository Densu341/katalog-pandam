<!-- edit content start here-->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMaterialModal">Add Material</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Material Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($material as $m) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $m['material_name']; ?></td>
                        <td><?= $m['mat_code']; ?></td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editMaterialModal<?= $m['mat_id']; ?>"><i class="fas fa-pen"></i></a>
                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMaterialModal" onclick="$('#deleteMaterialModal #formDelete').attr('action', '<?= base_url() ?>dashboard/deletematerial/<?= $m['mat_id']; ?>')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div> <!-- /.container-fluid -->
<!-- end of content-->
</div>

<!-- Modal -->
<div class="modal fade" id="newMaterialModal" tabindex="-1" role="dialog" aria-labelledby="newMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMaterialModalLabel">Add Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('dashboard/addmaterial'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="material_name" name="material_name" placeholder="Material Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="mat_code" name="mat_code" placeholder="Material Code">
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
<!-- end of modal -->

<!-- Modal -->
<?php foreach ($material as $m) : ?>
    <div class="modal fade" id="editMaterialModal<?= $m['mat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMaterialModalLabel">Edit Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('dashboard/editmaterial/' . $m['mat_id']); ?>
                <input type="hidden" name="mat_id" value="<?= $m['mat_id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="material_name" name="material_name" value="<?= $m['material_name']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mat_code" name="mat_code" value="<?= $m['mat_code']; ?>">
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
<?php endforeach; ?>
<!-- end of modal -->

<!-- Modal delete -->
<div class="modal fade" id="deleteMaterialModal" tabindex="-1" role="dialog" aria-labelledby="deleteMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMaterialModalLabel">Delete Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="" method="POST">
                <input type="hidden" name="mat_id" value="<?= $m['mat_id']; ?>">
                <div class="modal-body">
                    <p>Are you sure want to delete this material?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>