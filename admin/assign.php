<?php 
	//session_start();
	//if(empty(session_start())) {}
	include '../classes/Databases.php'; 
	$db = new Databases;
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">Assign</h3>
<div class="container-wrapper">
	<br>
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
		                     <th>Patient</th>  
		                     <th>Doctor</th>  
		                     <th>examine</th> 
                             <th>symptoms</th> 
		                     <th>Action</th> 
	                     </tr> 
	                </thead>
	                <tbody id="tbody">
	                </tbody>
	                <tfoot>
			    		<tr>
                        <th>ID</th>  
						<th>Patient</th>  
						<th>Doctor</th>  
						<th>examine</th> 
						<th>symptoms</th> 
						<th>Action</th> 
			            </tr>
			    	</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include '../includes/footer.php'; ?>
<!-- this modal updated the data -->
<div class="modal fade" id="modalUpdate" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
					<input type="text" name="updateid" id="updateid">
					<input type="text" name="patient_id" id="patient_id">
					<div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label">Examine</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<textarea class="form-control" id="editexamine"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">Symptoms</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<textarea class="form-control" id="editsymptoms"></textarea>
								</div>
							</div>
						</div>
					</div>
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
	        var assign = "assign";  
	        $.ajax({
	            url:"operations/select.php",  
	            method:"POST",  
	            data:{assign:assign},  
	            success:function(data) {

	            	$('#tbody').html(data);
	            	
	            }
	        });  
	   }


		 /* selects and display data into update modal */
		 $(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var updateassin = "updateassin";
			
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, updateassin: updateassin},
				dataType:"json",
				success: function(data) {
					$('#patient_id').val(data.patient_id);
				}
			});
			$('#modalUpdate').modal('show');
		});

		/* this method updates the data */
		$('#updateData').click(function() {
				var assign = "assign";
				var updateid = $('#updateid').val();
				var patient_id = $('#patient_id').val();
				var doctor_id = $('#doctor_id').val();
				var examine = $('#editexamine').val();
                var symptoms = $('#editsymptoms').val();
				if(patient_id=="" || doctor_id=="" || examine==""){
					alert("fadlan buuxi meelaha banaan")
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: {
							assign: assign,
							id: updateid,
							patient_id:patient_id,
							examine: examine,
                            symptoms: symptoms
						},
						success: function(data) {
							console.log(data);
							alert(data);
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
			    title: "DELETE?",
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
			// asslimit means assign limit
			var asslimit = $(this).val();
			$.ajax({
				url: 'operations/select.php',
				method: 'POST',
				data: {asslimit: asslimit},
				success: function(data) {
					$('#tbody').html(data);
				}
			});
		});

		/* this function will search data through the database */

		$('#search').on('keyup', function() {
			var search = $('#search').val();
			var limitsearch = "limitsearch";
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {limitsearch: limitsearch, search: search},
				success: function(data) {
					console.log(data);
					$('tbody').html(data);
				}
			});
		});

		$('#pName').on('keydown', function() {
			var searchP = $(this).val();
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {searchP: searchP},
				success: function(data){
					$('#listPatient').html(data);
				}
			});
		});

		/* this block is display the patient name */
		//SPName means Select Patient Name
		$(document).on('click', '#SPName', function() {
			var value = $(this).text();
			var id = $(this).attr('name');
			$('#patient_id').val(id);
			$('#pName').val(value);
			$('#listPatient').fadeOut();
		});

		$('#dName').on('keydown', function() {
			var searchD = $(this).val();
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {searchD: searchD},
				success: function(data){
					$('#listDoctors').html(data);
				}
			});
		});

		/* this block is display the patient name */
		//SDName means Select Doctor Name
		$(document).on('click', '#SDName', function() {
			var value = $(this).text();
			var id = $(this).attr('name');
			$('#doctor_id').val(id);
			$('#dName').val(value);
			$('#listDoctors').fadeOut();
		});

	});
</script>
