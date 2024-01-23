<?php
    $id = isset($user->id) ? ($user->id) : "";
    $rank = isset($user->rank) ? ($user->rank) : "";
    $machine_name = isset($user->machine_name) ? ($user->machine_name) : "";
    $section = isset($user->section) ? ($user->section) : "";
    $equip_no = isset($user->equip_no) ? ($user->equip_no) : "";
    $cycle = isset($user->cycle) ? ($user->cycle) : "";
?>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Edit User</h4>
</div>
<div class="modal-body">
    <input type="hidden" name="type_proses" value="update">
    <input type="hidden" name="id" value="<?=$id;?>">
    <div class="form-group">
        <label for="rank">Rank</label>
        <input type="text" class="form-control" id="rank" name="rank_edit" value="<?= $rank;?>">
    </div>
    <div class="form-group">
        <label for="machine_name">Nama Mesin</label>
        <input type="text" class="form-control" id="machine_name" name="machine_name_edit" value="<?= $machine_name;?>">
        <input type="hidden" class="form-control" id="machine_name_lama" name="machine_name_lama_edit" value="<?= $machine_name;?>">
    </div>
    <div class="form-group">
        <label for="section">Section</label>
        <input type="text" class="form-control" id="section" name="section_edit" value="<?= $section;?>">
    </div>
    <div class="form-group">
        <label for="equip_no">Equip No</label>
        <input type="text" class="form-control" id="equip_no" name="equip_no_edit" value="<?= $equip_no;?>">
        <input type="hidden" class="form-control" id="equip_no_lama" name="equip_no_lama_edit" value="<?= $equip_no;?>">
    </div>
    <div class="form-group">
        <label for="cycle">Cycle</label>
        <input type="text" class="form-control" id="cycle" name="cycle_edit" value="<?= $cycle;?>">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary" onclick="update()">Update</button>
</div>
