<?php //include '../classes/Databases.php';
	//$db = new Databases();
	/*$db->baseURL("includes/header.php");
	$db->baseURL("includes/side.php");
	$db->baseURL("includes/content.php");
	$db->baseURL("includes/footer.php");*/
 ?>
<?php include '../includes/header.php'; ?>
<?php include '../includes/side.php'; ?>
<?php include '../includes/content.php'; ?>
<?php include '../includes/footer.php'; ?>
<script>
	$(document).ready(function() {

		load_users();

		function load_users() {
			var count_users = "count_users";
			$.ajax({
				method: "POST",
				url: "operations/select.php",
				data: {count_users: count_users},
				success: function(data) {
					var users = JSON.parse(data);
					$('#count_users').text(users.data);
				}
			})
		}
	})
</script>
