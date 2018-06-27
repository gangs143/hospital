<?php 
	//session_start();
	//if(empty(session_start())) {}
	include '../classes/Databases.php'; 
	$db = new Databases;
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">History</h3>
<div class="container-wrapper">
</br></br>
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
        </br>
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
		                     <th>patient_name</th>  
		                     <th>doctor_name</th> 
                             <th>gender</th>  
		                     <th>status</th>  
                             <th>examine</th>  
		                     <th>symptoms</th> 
                             <th>date</th>  
		                     <th width="5">Action</th> 
	                     </tr> 
	                </thead>
	                <tbody id="tbody">
	                </tbody>
	                <tfoot>
			    		<tr>
						<th>ID</th>  
                        <th>patient_name</th>  
                        <th>doctor_name</th> 
                        <th>gender</th>  
                        <th>status</th>  
                        <th>examine</th>  
                        <th>symptoms</th> 
                        <th>date</th>  
                        <th width="5">Action</th> 
			            </tr>
			    	</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include '../includes/footer.php'; ?>

<script>
	$(document).ready(function() {

		//$('#table_users').DataTable();
		load_data();
		/* Select the Data */
		function load_data() {
	        var history = "history";  
	        $.ajax({
	            url:"operations/select.php",  
	            method:"POST",  
	            data:{history:history},  
	            success:function(data) {
	            	$('#tbody').html(data);
	            	
	            }
	        });  
	   }

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
		});
	});
</script>
