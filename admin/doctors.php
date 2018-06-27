<?php
	//session_start();
	//if(empty(session_start())) {}
	include '../classes/Databases.php';
	$db = new Databases;
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">Doctors</h3>
<div class="container-wrapper">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalInsert"><i class="fa fa-plus"></i> Add Doctor</button>
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
							<th>Department</th>
                            <th>phone</th>
                            <th>gender</th>
                            <th>Status</th>
                            <th>shift</th>
                            <th>salary</th>
                            <th>Action</th>
	                     </tr>
	                </thead>
	                <tbody id="tbody">
	                </tbody>
	                <tfoot>
			    		<tr>
                            <th>ID</th>
                            <th>name</th>
							<th>Department</th>
                            <th>phone</th>
                            <th>gender</th>
                            <th>Status</th>
                            <th>shift</th>
                            <th>salary</th>
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
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" id="submitForm">
                <div class="row">
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="name" name="name" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">phone</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="number" id="phone" name="phone" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">gender</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input type="text" id="gender" name="gender" class="form-control">
								</div>
							</div>
						</div>
					</div>
				<!-- <div></div> -->
				<div class="row">
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">status</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="status" name="status" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">title</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
									<input type="title" id="title" name="title" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">department</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="number" id="dep" name="dep" class="form-control">
								</div>
							</div>
						</div>
					</div>

					<!-- <div></div> -->
				<div class="row">
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">shift</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="shift" name="shift" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-4">
							<div class="form-group">
								<label class="control-label">Salary</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="salary" name="salary" class="form-control">
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
						<div class="col-md-offset-1 col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="name" id="dname">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">phone</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" class="form-control" name="phone" id="dphone">
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
									<input type="text" class="form-control" name="gender" id="dgender" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">status</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="text" class="form-control" name="status" id="dstatus">
								</div>
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">title</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="title" id="dtitle">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">department</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" class="form-control" name="dept" id="ddept">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">shift</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="shift" id="dshift">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">salary</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="number" class="form-control" name="salary" id="dsalary">
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

		/* Select the Data */
		function load_data() {
	        var doctor = "doctor";
	        $.ajax({
	            url:"operations/select.php",
	            method:"POST",
	            data:{doctor:doctor},
	            success:function(data) {

	            	$('#tbody').html(data);

	            }
	        });
	   }

		$('#action').val('insertdoctor');

		// insert the data into database using ajax
		$('#submitForm').submit(function(event) {
			event.preventDefault();
			var name = $('#name').val();
			var phone = $('#phone').val();
			var gender = $('#gender').val();
			var status = $('#status').val();
            var title = $('#title').val();
			var dep = $('#dep').val();
			var shift = $('#shift').val();
			var salary = $('#salary').val();
			if(name == '' || phone == '' || gender == '') {
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
						/*$(document).on('click', '#formData', function() {
							$(this)[0].reset();
						})*/
					}
				});
			}
		});

		 /* selects and display data into update modal */
		$(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var updatedoctor = "updatedoctor";

			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, updatedoctor: updatedoctor},
				dataType:"json",
				success: function(data) {
					$('#dname').val(data.name);
					$('#dphone').val(data.phone);
					$('#dgender').val(data.gender);
                    $('#dstatus').val(data.status);
					$('#dtitle').val(data.title);
					$('#ddept').val(data.dept);
					$('#dshift').val(data.shift);
					$('#dsalary').val(data.salary);
				}
			});
			$('#modalUpdate').modal('show');
		});

		/* this method updates the data */
		$('#updateData').click(function() {
				var doctor = "doctor";
				var updateid = $('#updateid').val();
				var name = $('#dname').val();
				var phone = $('#dphone').val();
				var gender = $('#dgender').val();
                var status = $('#dstatus').val();
				var title = $('#dtitle').val();
				var dept = $('#ddept').val();
				var shift = $('#dshift').val();
				var salary = $('#dsalary').val();
				if(name=="" || phone=="" || gender==""){
					alert("fadlan buuxi meelaha banaan")
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: { // name phone gender age status address  updater
							doctor: doctor,
							id: updateid,
							name: name,
							phone: phone,
							gender: gender,
                            status: status,
							title: title,
							dept: dept,
							shift: shift,
							salary: salary
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
			var id = $(this).attr('id');
			bootbox.dialog({
			    title: "DELETE ?",
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
			var limitdoctor = $(this).val();
			$.ajax({
				url: 'operations/select.php',
				method: 'POST',
				data: {limitdoctor: limitdoctor},
				success: function(data) {
					$('#tbody').html(data);
				}
			});
		});

		/* this function will search data through the database */

		$('#search').on('keyup', function() {
			var search = $('#search').val();
			var limitsearch = "searchdoctor";
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {searchdoctor: limitsearch, search: search},
				success: function(data) {
					$('tbody').html(data);
				}
			});
		});

	});
</script>
