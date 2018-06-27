<!DOCTYPE html>
<html>
<head>
	<title>Login Section</title>
	<script src="../js/jquery-3.2.1.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4>Login Page</h4>
					</div>
					<div class="panel-body">
						<form>
							<div class="row">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i></i></span>
										<input type="text" name="username" id="username" class="form-control" autocomplete="off">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i></i></span>
										<input type="password" name="password" id="password" class="form-control" autocomplete="off">
									</div>
								</div>
							</div>
						</form>
						<div class="row">
							<div class="col-md-offset-4 col-md-4 col-md-offset-4">
								<button class="btn btn-success btn-block" id="btn-login">Login</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src="../js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#btn-login').on('click', function() {
			var username = $('#username').val();
			var password = $('#password').val();
			var submit = "submit";
			$.ajax({
				url: "login.php",
				method: "POST",
				data: {username: username, password: password, submit: submit},
				success: function(data) {
					alert(data);
					window.location.replace('../admin');
				}
			})
		})
	})
</script>