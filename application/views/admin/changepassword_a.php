<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('dashboard/changepassword'); ?>
            <div class="form-group">
                <label for="current_password" class="col-sm col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="new_password1" class="col-sm col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="new_password2" class="col-sm col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </div>
    </div>
</div>