<?php
    $id = isset($user->id) ? ($user->id) : "";
    $kode_user = isset($user->kode_user) ? ($user->kode_user) : "";
    $username = isset($user->username) ? ($user->username) : "";
    $password = isset($user->password) ? ($user->password) : "";
    $full_name = isset($user->full_name) ? ($user->full_name) : "";
    $no_hp = isset($user->no_hp) ? ($user->no_hp) : "";
    $email = isset($user->email) ? ($user->email) : "";
    $kode_role = isset($user->kode_role) ? ($user->kode_role) : "";
?>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Edit User</h4>
</div>
<div class="modal-body">
    <input type="hidden" name="type_proses" value="update">
    <input type="hidden" name="id" value="<?=$id;?>">
    <div class="form-group">
        <label for="kode_user">Kode User</label>
        <input type="text" class="form-control" id="kode_user" name="kode_user_edit" value="<?= $kode_user;?>">
        <input type="hidden" class="form-control" id="kode_user_lama" name="kode_user_lama_edit" value="<?= $kode_user;?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username_edit" value="<?= $username;?>">
        <input type="hidden" class="form-control" id="username_lama" name="username_lama_edit" value="<?= $username;?>">
    </div>
    <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name_edit" value="<?= $full_name;?>">
    </div>
    <div class="form-group">
        <label for="no_hp">No HP</label>
        <input type="text" class="form-control" id="no_hp" name="no_hp_edit" value="<?= $no_hp;?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email_edit" value="<?= $email;?>">
    </div>
    <div class="form-group">
        <label for="password">Password <small style="font-size: 8pt; font-weight: normal; color: red;">*kosongkan jika tidak update password</small></label>
        <input type="password" class="form-control" id="password" name="password_edit" value="">
    </div>
    <div class="form-group">
        <label>Select</label>
        <select class="form-control" name="kode_role_edit">
            <option value="">-- Pilih Level --</option>
            <?php foreach($role as $row) :?>
                <option value="<?=$row->kode_role?>" <?php if($kode_role == $row->kode_role) print_r("selected");?>><?=$row->name_role?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary" onclick="update()">Update</button>
</div>
