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
        <div class="box-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add" onclick="clear_form()">+ Tambah</button>
        </div>
        <div class="box-body">
            <div class="table-responsive">
							<table id="datatable" class="table table-bordered table-hover" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Rank</th>
										<th>Name</th>
										<th>Section</th>
										<th>Equip No</th>
										<th>Cycle</th>
										<th>#</th>
									</tr>
								</thead>
							</table>
						</div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

    <script>
       $(document).ready(function(){
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "order":[],
                "ajax":{
                    "url":"<?=base_url()?>mesin/get_data_mesin",
                    "type":"POST"
                },
                "columnDefs":[
                    {
                        "targets":[0],
                        "orderable" : false,
                    },
                ],
				"order": [
					
				],
            })
        });

        function clear_form(){
          $('input[name="rank"]').val('');
          $('input[name="machine_name"]').val('');
          $('input[name="section"]').val('');
          $('input[name="equip_no"]').val('');
          $('input[name="cycle"]').val('');
        }

        function save(){
        var rank = $('input[name="rank"]').val();
        var machine_name = $('input[name="machine_name"]').val();
        var section = $('input[name="section"]').val();
        var equip_no = $('input[name="equip_no"]').val();
        var cycle = $('input[name="cycle"]').val();

        $.ajax({
          url: "<?=base_url()?>mesin/add_mesin",
          data: {rank: rank, machine_name: machine_name, section: section, equip_no: equip_no, cycle: cycle},
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

      function del(id, nama){
        Swal.fire({
          title: 'Anda yakin ?',
          text: "menghapus Mesin "+nama,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
            url: "<?=base_url()?>mesin/delete",
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

      function edit(id){
      $.ajax({
            url: "<?=base_url()?>mesin/edit",
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
        var rank = $('input[name="rank_edit"]').val();
        var machine_name = $('input[name="machine_name_edit"]').val();
        var machine_name_lama = $('input[name="machine_name_lama_edit"]').val();
        var section = $('input[name="section_edit"]').val();
        var equip_no = $('input[name="equip_no_edit"]').val();
        var equip_no_lama = $('input[name="equip_no_lama_edit"]').val();
        var cycle = $('input[name="cycle_edit"]').val();
        $.ajax({
          url: "<?=base_url()?>mesin/update_mesin",
          data: {id:id, rank: rank, machine_name: machine_name, machine_name_lama: machine_name_lama, section: section, equip_no: equip_no, equip_no_lama: equip_no_lama, cycle: cycle},
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

      function penilaian(id){
      $.ajax({
            url: "<?=base_url()?>mesin/penilaian",
            data: {id:id},
            type: "POST",
            dataType : "JSON",
            success:function(response){
              $("#form-penilaian").html(response);
            }
          });
      }
    </script>


	<!-- modal add -->
  <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Mesin</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="rank">Rank</label>
              <input type="text" class="form-control" id="rank" name="rank">
            </div>
            <div class="form-group">
              <label for="machine_name">Mesin</label>
              <input type="text" class="form-control" id="machine_name" name="machine_name">
            </div>
            <div class="form-group">
              <label for="section">Section</label>
              <input type="section" class="form-control" id="section" name="section">
            </div>
            <div class="form-group">
              <label for="equip_no">Equip No</label>
              <input type="text" class="form-control" id="equip_no" name="equip_no">
            </div>
            <div class="form-group">
              <label for="cycle">Cycle</label>
              <input type="text" class="form-control" id="cycle" name="cycle">
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


    	<!-- modal edit -->
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
    <!-- /.modal edit -->


    <!-- modal penilaian -->
    <div class="modal fade" id="modal-penilaian">
		<div class="modal-dialog" style="width:1400px">
			<div class="modal-content">

				<div class="modal-header" id="form-penilaian">
					
					
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
    	<!-- /.modal-dialog -->
    </div>
    <!-- /.modal penilaian -->