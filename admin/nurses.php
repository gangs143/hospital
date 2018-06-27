<?php 
	//session_start();
	//if(empty(session_start())) {}
	include '../classes/Databases.php'; 
	$db = new Databases;
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">Nurses</h3>
<div class="container-wrapper">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalInsert"><i class="fa fa-plus"></i> Add Nurse</button>
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
                            <th>nurse name</th>  
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
							<th>nurse name</th>  
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
                 <!-- start point  -->
                 <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Nurse Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="name" name="name" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">phone</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input type="number" id="phone" name="phone" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">gender</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="gender" name="gender" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Status</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="status" name="status" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Shift</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-bars"></i></span>
									<input type="text" id="shift" name="shift" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4">
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
				<h4 class="modal-title">nurse update model</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="updateForm">
					<input type="hidden" name="id" id="updateid">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">Name</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" id="nrname" name="nrname" class="form-control">
								</div>
							</div>
						</div>
			
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">phone</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input type="number" id="nrphone" name="nrphone" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">gender</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select id="gender" name="nrgender" class="form-control"></select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">status</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
									<select id="nrstatus" name="nrstatus" class="form-control"></select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">Shift</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-bars"></i></span>
									<select id="nrshift" name="nrshift" class="form-control"></select>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label class="control-label">Salary</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-usd"></i></span>
									<input type="text" id="nrsalary" name="nrsalary" class="form-control">
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
	        var nrsearch = "nrsearch";  
	        $.ajax({
	            url:"operations/select.php",  
	            method:"POST",  
	            data:{nrsearch:nrsearch},  
	            success:function(data) {

	            	$('#tbody').html(data);
	            	
	            }
	        });  
	   }

		$('#action').val('nrinsert');

		// insert the data into database using ajax 
		$('#submitForm').submit(function(event) {
			event.preventDefault();
			var name = $('#name').val();
			var phone = $('#phone').val();
			var gender = $('#gender').val();
			var hiredate = $('#hiredate').val();
			var status = $('#status').val();
			var shift = $('#shift').val();
			var dep = $('#dep').val();
			var salary = $('#salary').val();
    if(name == '' ||  phone == '' || gender == '' ||  status == ''
    || shift == ''|| dep == '' ||salary == '') {
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
			var nrselect = "nrselect";
			
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, nrselect: nrselect},
				dataType:"json",
				success: function(data) {
					$('#nrname').val(data.name);
					$('#nrphone').val(data.phone);
					$('#nrgender').val(data.gender);
					$('#nrstatus').val(data.status);
					$('#nrshift').val(data.shift);
					$('#nrsalary').val(data.salary);
				}
			});
			$('#modalUpdate').modal('show');
		});
//this method updates the data
		$('#updateData').click(function() {
            var nrupdate = "nrupdate";
            var updateid = $('#updateid').val();
            var name = $('#nrname').val();
            var phone = $('#nrphone').val();
            var gender = $('#nrgender').val();
            var hiredate = $('#nrhiredate').val();
			var status = $('#nrstatus').val();
            var shift = $('#nrshift').val();
			var dep = $('#nrdep').val();
            var salary = $('#nrsalary').val();
          
            if(name=="" ||  phone==""||gender=="" || status=="" || shift=="" 
			|| dep == ""|| salary == "" )
                            {
                                alert("fadlan buuxi meelaha banaan");
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: {
							nrupdate: nrupdate,
							id: updateid,
							name: name,
							dep: dep,
							phone: phone,
							gender: gender,
							status: status,
							shift: shift,
							salary:salary
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
			var nurse = $(this).attr('id');
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
								data: {id: nurse},
								success: function(data) {
									alert(data);
									load_data();
								}
							});
			            }
			        }
			    },
			});
		});


		/* this function will load a limit of data */
		$(document).on('change', '#displayLimit', function() {
			var nurlimit = $(this).val();
			$.ajax({
				url: 'operations/select.php',
				method: 'POST',
				data: {nurlimit: nurlimit},
				success: function(data) {
					$('#tbody').html(data);
				}
			});
		});

		/* this function will load a limit of data */
		$(document).on('change', '#displayLimit', function() {
			var limit = $(this).val();
			$.ajax({
				url: 'operations/select.php',
				method: 'POST',
				data: {limitnurses: limit},
				success: function(data) {
					$('#tbody').html(data);
				}
			});
		});

		/* this function will search data through the database */

		$('#search').on('keyup', function() {
			var search = $('#search').val();
			var limitsearch = "nursearch";
			if(search == "") {
				load_data();
			}
			else {
				$.ajax({
					url: "operations/select.php",
					method: "POST",
					data: {nursearch: limitsearch, search: search},
					success: function(data) {
						$('#tbody').html(data);
					}
				});
			}
		});

	});
</script>
