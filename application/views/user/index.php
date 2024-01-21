    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$page?>
      </h1>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add" onclick="clear_form()">+ Tambah</button>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<table id="datatable" class="table table-bordered table-hover" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Code User</th>
										<th>Username</th>
										<th>Full Name</th>
										<th>No HP</th>
										<th>Email</th>
										<th>Role</th>
										<th>#</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- /.content -->
    <script>
        $(document).ready(function(){
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "order":[],
                "ajax":{
                    "url":"<?=base_url()?>user/get_data_user",
                    "type":"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0,3,4,5],
                        "orderable" : false,
                    },
                ],
				"order": [
					
				],
            })
        });

      function clear_form(){
        $('input[name="kode_user"]').val('');
        $('input[name="username"]').val('');
        $('input[name="full_name"]').val('');
        $('input[name="no_hp"]').val('');
        $('input[name="password"]').val('');
        $('select[name="role"]').val('');
        $('select[name="email"]').val('');
      }

      function save(){
        var kode_user = $('input[name="kode_user"]').val();
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        var full_name = $('input[name="full_name"]').val();
        var email = $('input[name="email"]').val();
        var no_hp = $('input[name="no_hp"]').val();
        var role  = $('select[name="role"]').val();
        // console.log(username+","+nama+","+no_hp+","+password+","+level);i
        $.ajax({
          url: "<?=base_url()?>user/add_user",
          data: {kode_user: kode_user, username: username, password: password, full_name: full_name, email: email, no_hp: no_hp, role: role},
          type: "POST",
          dataType : "JSON",
          success:function(response){
            if(response.error){
              Swal.fire(
                response.error,
                'Error!',
                'error'
              )
            }else{
              Swal.fire(
                response.success,
                'Success',
                'success'
              );
			  reload_datatable();
			  $("#modal-add").modal('hide');
            }
          }
        });
      }

	  function reload_datatable(){
		  $('#datatable').DataTable().ajax.reload();
	  }

	  function edit(id){
		$.ajax({
          url: "<?=base_url()?>user/edit",
          data: {id:id},
          type: "POST",
          dataType : "JSON",
          success:function(response){
            $("#form-edit").html(response);
          }
        });
	  }

	  function update(){
        var id = $('input[name="id"]').val();
        var kode_user = $('input[name="kode_user_edit"]').val();
        var kode_user_lama = $('input[name="kode_user_lama_edit"]').val();
        var username = $('input[name="username_edit"]').val();
        var username_lama = $('input[name="username_lama_edit"]').val();
        var full_name = $('input[name="full_name_edit"]').val();
        var no_hp = $('input[name="no_hp_edit"]').val();
        var email = $('input[name="email_edit"]').val();
        var password = $('input[name="password_edit"]').val();
        var kode_role  = $('select[name="kode_role_edit"]').val();
        // console.log(username+","+nama+","+no_hp+","+password+","+level);
        $.ajax({
          url: "<?=base_url()?>user/update_user",
          data: {id:id, kode_user: kode_user, kode_user_lama: kode_user_lama, username: username, full_name: full_name, no_hp: no_hp, password: password, kode_role: kode_role, username_lama: username_lama, email:email},
          type: "POST",
          dataType : "JSON",
          success:function(response){
            if(response.error){
              Swal.fire(
                response.error,
                'Error!',
                'error'
              )
            }else{
              Swal.fire(
                response.success,
                'Success',
                'success'
              );
			  reload_datatable();
			  $("#modal-edit").modal('hide');
            }
          }
        });
      }

	  function del(id, nama){
		Swal.fire({
			title: 'Anda yakin ?',
			text: "menghapus user "+nama,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
				url: "<?=base_url()?>user/delete",
					data: {id:id},
					type: "POST",
					dataType : "JSON",
					success:function(response){
						Swal.fire(
							response.success,
							'Deleted',
							'success'
						);
						reload_datatable();
					}
				});
			}
		})
	  }
    </script>

	<!-- modal add -->
    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah User</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="kode_user">Kode User</label>
              <input type="text" class="form-control" id="kode_user" name="kode_user">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <label for="full_name">Full Name</label>
              <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            
            <div class="form-group">
            <label>Select</label>
              <select class="form-control" name="role">
                <option value="">-- Pilih Role --</option>
                <?php foreach($level as $row) :?>
                  <option value="<?=$row->kode_role?>"><?=$row->name_role?></option>
                <?php endforeach;?>
              </select>
          </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add -->

	<!-- modal hide -->
    <div class="modal fade" id="modal-edit">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header" id="form-edit">
					
					
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
    	<!-- /.modal-dialog -->
    </div>
    <!-- /.modal hide -->

