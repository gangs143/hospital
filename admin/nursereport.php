<?php
	//session_start();
	//if(empty(session_start())) {}
?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<h3 class="page-title">Nurses Reports</h3>
<div class="container-wrapper">
	<div class="row">
			<div class="col-md-3">
				<input type="date" id="startDate" class="form-control">
			</div>
			<div class="col-md-3">
				<input type="date" id="endDate" class="form-control">
			</div>
			<div class="col-md-3">
				<select id="shift" class="form-control">
					<option>all</option>
					<option>morning</option>
					<option>afternoon</option>
					<option>night</option>
				</select>
			</div>
			<div class="col-md-3">
				<button id="searchDate" class="btn">Filter</button>
			</div>
		</div>
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Status</th>
					<th>Hired</th>
					<th>Shift</th>
					<th>Department</th>
					<th>Number</th>
				</tr>
			</thead>
			<tbody id="table-info"></tbody>
		</table>
</div>
<?php include '../includes/footer.php'; ?>
<script>
	$(document).ready(function() {
		loadData();

		function loadData() {
			var load = "load";
			$.ajax({
				url: "operations/reports.php",
				method: "POST",
				data: {load: load},
				success: function(data) {
					$('#table-info').html(data);
				}
			});
		}

		$('#searchDate').click(function() {
			var sDate = $('#startDate').val();
			var eDate = $('#endDate').val();
			var shift = $('#shift').val();
			$.ajax({
				url: "query.php",
				method: "POST",
				data: {sDate: sDate, eDate: eDate, shift: shift},
				success: function(data) {
					$('#table-info').html(data);
				}
			})
		});
	})
</script>
