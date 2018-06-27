<?php 
	//session_start();
	//if(empty(session_start())) {}
	include '../classes/Databases.php'; 
	$db = new Databases;
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">Floor</h3>
<div class="container-wrapper">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalInsert"><i class="fa fa-plus"></i> Add Room</button>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label>Showing</label>
			<select class="form-control" id="displayLimit">
				<option>10</option>
				<option>25</option>
				<option>50</option>
				<option>100</option>
			</select>
			<label>entries</label>
			</div>
		</div>
		<div class="col-md-4 pull-right">
			<form class="form-inline">
				<div class="form-group">
					<label><strong>Search</strong></label>
					<input type="search" name="search" class="form-control" id="search">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="displayTable" class="table-responsive">
				<table class="table table-bordered table-striped" id="table_users">
					<thead>  
	                     <tr>
	                     	<th>ID</th>  
		                     <th>FloorName</th>  
		                     <th>Action</th> 
	                     </tr> 
	                </thead>
	                <tbody id="tbody">
	                </tbody>
	                <tfoot>
			    		<tr>
						<th>ID</th>  
						<th>FloorName</th>  
						<th>Action</th> 
			            </tr>
			    	</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include '../includes/footer.php'; ?>


<!-- this modal inserts data -->
<div id="modalInsert" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header insert">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Floor</h4>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" id="submitForm">
					<div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">Room No</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="number" id="roomno" name="roomno" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">FLoor</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<select class="form-control" id="floorid" name="floorid">
										<option></option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-4 col-md-4 col-md-offset-4">
							<input type="hidden" name="action" id="action" value="insert">
							<input type="submit" class="btn btn-success" id="sendData" name="send" value="Insert" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- this modal updated the data -->
<div class="modal fade" id="modalUpdate" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="updateForm">
					<input type="hidden" name="id" id="updateid">
					<div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">ID</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="number" class="form-control" name="id" id="eid">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">floorName</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="text" class="form-control" name="floor" id="efloor">
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="row">
					<div class="col-md-offset-4 col-md-4 col-md-offset-4">
						<button id="updateData" class="btn btn-info btn-block">Update Data</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		//$('#table_users').DataTable();
		load_data();

		// this function loads the floor
		loadFloor();

		/* Select the Data */
		function load_data() {
	        var load = "loadfloor";  
	        $.ajax({
	            url:"operations/select.php",  
	            method:"POST",  
	            data:{loadfloor:load},  
	            success:function(data) {
	            	$('#tbody').html(data);
	            	
	            }
	        });  
	   }

		$('#action').val('insertroom');

		// insert the data into database using ajax 
		$('#submitForm').submit(function(event) {
			event.preventDefault();
			var roomno = $('#roomno').val();
			var floor = $('#floor').val();
			var beds = $('#beds').val();
			if(roomno == '' || floor == '' || beds == '') {
				alert("fadlan buuxi");
				return false;
			}
			else {
				$.ajax({
					url: "operations/insert.php",
					method: "post",
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						alert(data);
						load_data();
						$('#submitForm')[0].reset();
						$('#modalInsert').modal('hide');
					}
				});
			}
		});

		 /* selects and display data into update modal */
		$(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var updatefloor = "updatefloor";
			
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, updatefloor: updatefloor},
				dataType:"json",
				success: function(data) {
					$('#eid').val(data.id);
					$('#efloor').val(data.floor);
				}
			});
			$('#modalUpdate').modal('show');
		});

		/* this method updates the data */
		$('#updateData').click(function() {
				var update = "update";
				var updateid = $('#updateid').val();
				var id = $('#eid').val();
				var floor = $('#efloor').val();
				if(id=="" || floor=="" ){
					alert("fadlan buuxi meelaha banaan")
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: {
							update: update,
							id: updateid,
							id: id,
							floor: floor
						},
						success: function(data) {
							console.log(data);
							alert(data);
							$('#updateForm')[0].reset();
							$('#modalUpdate').modal('hide');
							load_data();
						}
					});
				}
			});

		/* Delete the Data */
		$(document).on('click', '.btn-delete', function() {
			var id = $(this).attr('id');
			bootbox.dialog({
			    title: "Destroy planet?",
			    message: "Ma hubtaa in aad tirtid xogtan.",
			    buttons: {
			        cancel: {
			            label: '<i class="fa fa-times"></i> Cancel',
			            callback: function() {
			            	return false;
			            }
			        },
			        noclose: {
			            label: '<i class="fa fa-trash"></i> Confirm',
			            className: 'btn-danger',
			            callback: function() {
			            	$.ajax({
								url: "operations/delete.php",
								method: "post",
								data: {id: id},
								success: function(data) {
									alert(data);
									load_data();
								}
							});
			            }
			        }
			    },
			});
			// swal("Oops...", "Something went wrong!", "error");
			
			/*if(confirm("ma hubtaa in aad tuurayso")) {
				
			}
			else {
				return false;
			}*/
		});

		/* this function will load a limit of data */
		$(document).on('change', '#displayLimit', function() {
			var limitfloor = $(this).val();
			$.ajax({
				url: 'operations/select.php',
				method: 'POST',
				data: {limitfloor: limitfloor},
				success: function(data) {
					$('#tbody').html(data);
				}
			});
		});

		/* this function will search data through the database */

		$('#search').on('keyup', function() {
			var search = $('#search').val();
			var searchfloor = "limitfloor";
			if(search == "") {
				load_data();
			}
			else {
				$.ajax({
					url: "operations/select.php",
					method: "POST",
					data: {searchfloor: searchfloor, search: search},
					success: function(data) {
						$('#tbody').html(data);
					}
				});
			}
		});

		function loadFloor() {
			var floor = "loadFloor";
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {floor: floor},
				success: function(data) {
					$('#floorid').html(data);
				}
			})
		}
	});
</script>
