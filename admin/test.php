<?php 
	include '../classes/Databases.php'; 
	$db = new Databases;

	$fields = array('username', 'password', 'email');
	$data = array(
			'username = ' => "admin",
			' and password = ' => "admin",
			' or email = ' => "jaamac@gmail.com"
		);
	$query = $db->execute_get('users',$fields, $data, 'id');
	echo "<pre>";
	print_r($query);
	echo "</pre>";
	//echo $query;

?>