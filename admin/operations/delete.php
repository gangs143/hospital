<?php 
	include '../../classes/Databases.php'; 
	$db = new Databases;

	if(isset($_POST['id'])) {
		$id = $_POST['id'];
		if ($db->delete_query("users", $id)) { 
			echo "deleted successfull";
		}

	}

	//DELETE pateint
	if(isset($_POST['id'])) {
		$patient = $_POST['id'];
		if ($db->delete_query("patient", $id)) { 
			echo "deleted successfull";
		}

	}

	
	//doctor delete
	if(isset($_POST['id'])) {
		$doctor = $_POST['id'];
		if ($db->delete_query("doctors", $id)) { 
			 echo "deleted successfull";
		}

	}
	//Nurses delete
	if(isset($_POST['id'])) {
		$nurse = $_POST['id'];
		if ($db->delete_query("nurses", $id)) { 
			 echo "deleted successfull";
		}
	}
	//Nurses delete
	if(isset($_POST['id'])) {
		$nurse = $_POST['id'];
		if ($db->delete_query("assign", $id)) { 
			 echo "deleted successfull";
		}
	}
 ?>