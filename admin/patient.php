<?php 
	//session_start();
	//if(empty(session_start())) {}
	include '../classes/Databases.php'; 
	$db = new Databases;

?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">Patient</h3>
<div class="container-wrapper">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalInsert"><i class="fa fa-plus"></i> Add Patient</button>
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
		                     <th>name</th>  
		                     <th>address</th>  
		                     <th>status</th> 
                             <th>age</th>  
		                     <th>gender</th>  
		                     <th>phone</th>  
                             <th>date</th>  
		                     <th width="75">Action</th> 
	                     </tr> 
	                </thead>
	                <tbody id="tbody">
	                </tbody>
	                <tfoot>
			    		<tr>
                        <th>ID</th>  
                        <th>name</th>  
                        <th>address</th>  
                        <th>status</th> 
                        <th>age</th>  
                        <th>gender</th>  
                        <th>phone</th>  
						<th>date</th>  
                        <th  width="75">Action</th>
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
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" id="submitForm">
					<div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="name" name="name" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">Address</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="text" id="address" name="address" class="form-control">
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">status</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="status" name="status" class="form-control" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">age</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" id="age" name="age" class="form-control">
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">gender</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="gender" name="gender" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">phone</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" id="phone" name="phone" class="form-control">
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
								<label class="control-label">name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="name" id="editname">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">phone</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" class="form-control" name="phone" id="editphone">
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">gender</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="gender" id="editgender" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">age</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" class="form-control" name="age" id="editage">
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">status</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="status" id="editstatus">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">address</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="text" class="form-control" name="address" id="editaddress">
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

<div class="modal fade" id="modalassign" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background-color:gray">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-5 col-md-offset-1">
			<table class="table table-bordered table-striped" id="tblassign" >
			<input type="hidden" name="patient_id" id="patient_id">
				</table>
			</div>

				<div class="col-md-5 col-md-offset-1">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-"></i>doctors</span>
						<select class="form-control" id="doctor_id" name="doctor_id">
							<option></option>
						</select>
					</div>
				</div>
			</div>
				</div>
				<div class="row">
				<div class="col-md-offset-4 col-md-4 col-md-offset-4">
					<input type="hidden" name="action" id="action" value="insert">
					<input type="submit" class="btn btn-success" id="sendDat" name="send" value="Insert" />
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

		/* Select the Data */
		function load_data() {
	        var patient = "patient";  
	        $.ajax({
	            url:"operations/select.php",  
	            method:"POST",  
	            data:{patient:patient},  
	            success:function(data) {
	            	$('#tbody').html(data);
	            }
	        });  
	   }

		$('#action').val('insertpatient');

		// insert the data into database using ajax 
		$('#submitForm').submit(function(event) {
			event.preventDefault();  
			var name = $('#name').val();
			var phone = $('#phone').val();
			var gender = $('#gender').val();
			var age = $('#age').val();
            var status = $('#status').val();
			var address = $('#address').val();
			var updater = $('#updater').val();
			if(name == '' || address == '' || phone == '') {
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
			var updatepatient = "updatepatient";
			
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, updatepatient: updatepatient},
				dataType:"json",
				success: function(data) {
					$('#editname').val(data.name);
					$('#editphone').val(data.phone);
					$('#editgender').val(data.gender);
                    $('#editage').val(data.age);
					$('#editstatus').val(data.status);
					$('#editaddress').val(data.address);
				}
			});
			$('#modalUpdate').modal('show');
		});
//assign model
$(document).on('click', '.btn-assign', function() {
			loadDoctors();
			var id = $(this).attr('id');
			$('#patient_id').val(id);
			var updateassign = "updateassign";
			
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, updateassign: updateassign},
				success: function(data) {
					$('#tblassign').html(data);
				}
			});
			$('#modalassign').modal('show');
		});

		/* this method updates the data */
		$('#updateData').click(function() {
				var patient = "patient";
				var updateid = $('#updateid').val();
				var name = $('#editname').val();
				var phone = $('#editphone').val();
				var gender = $('#editgender').val();
                var age = $('#editage').val();
				var status = $('#editstatus').val();
				var address = $('#editaddress').val();
				if(name=="" || status=="" || phone==""){
					alert("fadlan buuxi meelaha banaan")
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: { // name phone gender age status address  updater
							patient: patient,
							id: updateid,
							name: name,
							phone: phone,
							gender: gender,
                            age: age,
							status: status,
							address: address
						},
						success: function(data) {
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
			var patient = $(this).attr('id');
			bootbox.dialog({
			    title: "Destroy planet?",
			    message: "Ma hubtaa in aad tirtid xogtan.",
			    buttons: {
			        cancel: {
			            label: '<i class="fa fa-times"></i> Cancel',
			            callback: function() {
			            	return true;
			            }
			        },
			        noclose: {
			            label: '<i class="fa fa-trash"></i> Confirm',
			            className: 'btn-danger',
			            callback: function() {
			            	$.ajax({
								url: "operations/delete.php",
								method: "post",
								data: {id: patient},
								success: function(data) {
									alert(data);
									//load_data();
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
			var limitpatient = $(this).val();
			$.ajax({
				url: 'operations/select.php',
				method: 'POST',
				data: {limitpatient: limitpatient},
				success: function(data) {
					$('#tbody').html(data);
				}
			});
		});

		/* this function will search data through the database */

		$('#search').on('keyup', function() {
			var search = $('#search').val();
			var limitsearch = "searchpatient";
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {searchpatient: limitsearch, search: search},
				success: function(data) {
					$('tbody').html(data);
				}
			});
		});

	});
	function loadDoctors() {
			var docassign = "docassign";
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {docassign: docassign},
				success: function(data) {
					$('#doctor_id').html(data);
				}
			})
		}
		// insert the data into database using ajax 
		
		
		$('#sendDat').click(function() {
			var assaction ="assaction";
			var patient_id = $('#patient_id').val();
			var doctor_id = $('#doctor_id').val();
				$.ajax({
					url: "operations/insert.php",
					method: "post",
					data: {
						patient_id:patient_id,
						doctor_id:doctor_id,
						assaction:assaction
					},
					success: function(data) {
						console.log(data);
						alert(data);
						load_data();
						$('#submitForm')[0].reset();
						$('#modalassign').modal('hide');
					}
				});
		});
</script>

