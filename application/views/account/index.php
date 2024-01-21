<?php (get_photo_user($this->session->userdata("id")) == "") ? $image ="default.png": $image = get_photo_user($this->session->userdata("id"))?> 
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>
        <?=$page?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <input type="hidden" name="id" value="<?= $this->session->userdata("id");?>">
          <input type="hidden" name="kode_user" value="<?= $this->session->userdata("kode_user");?>">
          <input type="hidden" name="username" value="<?= $this->session->userdata("username");?>">

          <div class="d-flex" style="margin-top:10px;">
            <div class="col-md-7 text-center">
                <table class="table table-bordered">
                  <tbody>
                      <tr>
                        <th>Nama</th>
                        <th>:</th>
                        <th><?= $this->session->userdata("full_name");?></th>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <th>:</th>
                        <th>
                          <input type="text" name="email" class="form-control" value="<?= get_email_user($this->session->userdata("id")) ?>">
                        </th>
                      </tr>
                      <tr>
                        <th>Handphone</th>
                        <th>:</th>
                        <th>
                          <input type="text" name="no_hp" class="form-control" value="<?= get_no_hp_user($this->session->userdata("id")) ?>">
                        </th>
                      </tr>
                      <tr>
                        <th>Role</th>
                        <th>:</th>
                        <th><?= $this->session->userdata("role");?></th>
                      </tr>
                      <tr>
                        <th>Terdaftar Sejak</th>
                        <th>:</th>
                        <th><?= $this->session->userdata("create_date");?></th>
                      </tr>
                  </tbody>
                </table>
            </div>
            <div class="col-md-5 mx-auto text-center">
              <div style="height:250px; width:250px; margin-left:auto; margin-right:auto;" class="justify-content-center">
                <img class="" src="<?=base_url()?>assets/upload/profile/<?= $image; ?>" alt="User profile picture" style="width:100%; display:block; " >
              </div>
              
                <input type="file" name="file" id="file" style="margin:0 auto; float:none; margin-top:5px;">
              
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button class="btn btn-primary text-right" id="btn_upload" onclick="save()">Update</button>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

    <script type="text/javascript">
      function save(){
        var id = $('input[name="id"]').val();
        var kode_user = $('input[name="kode_user"]').val();
        var username = $('input[name="username"]').val();
        var email = $('input[name="email"]').val();
        var no_hp = $('input[name="no_hp"]').val();

        var formData = new FormData();
        var file_data = $("#file").prop("files")[0];
        formData.append('id', id);
        formData.append('kode_user', kode_user);
        formData.append('username', username);
        formData.append('email', email);
        formData.append('no_hp', no_hp);
        
        if(file_data==null){
          formData.append('file', "default.png");
        }else{
          formData.append('file', file_data);
        }
        
        $.ajax({
            url:'<?php echo base_url();?>user/do_upload',
            type:"post",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(response){
                Swal.fire(
                  response.success,
                  'Success',
                  'success'
                );
                window.location.reload();
            }
        });
      }
  </script>