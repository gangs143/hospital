<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>

<div class="modal fade" id="modalassign" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
				
            <table class="table table-bordered table-striped" id="table_users" >
					<thead>  
	                     <tr>
	                     	<th>ID</th>  
		                     <th>name</th>  
		                     <th>address</th>  
		                     <th>status</th>
		                     <th>Action</th> 
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
                        <th>Action</t
			            </tr>
			    	</tfoot>
				</table>
				<div class="row">
					<div class="col-md-offset-4 col-md-4 col-md-offset-4">
						<button id="updateData" class="btn btn-info btn-block">Update Data</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include '../includes/footer.php'; ?>