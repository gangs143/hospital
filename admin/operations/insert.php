<?php 
	include '../../classes/Databases.php';
	$db = new Databases;

	//patient insert
	if($_POST['action'] == "insertpatient") {
		$name = $_POST['name'];
		$status = $_POST['status'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$data = array(
			'name' => mysqli_real_escape_string($db->conn, $name),
			'status' => mysqli_real_escape_string($db->conn, $status),
			'age' => mysqli_real_escape_string($db->conn, $age),
			'gender' => mysqli_real_escape_string($db->conn, $gender),
			'phone' => mysqli_real_escape_string($db->conn, $phone),
			'address' => mysqli_real_escape_string($db->conn, $address)
		);
		$query = $db->insert_query('patient', $data);
		echo 'Data inserted Successfull';
	}
//doctor insert
	if($_POST['action'] == "insertdoctor") {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$title = $_POST['title'];
		$dep = $_POST['dep'];
		$shift = $_POST['shift'];
		$salary = $_POST['salary'];
	
		$data = array(
			'name' => mysqli_real_escape_string($db->conn, $name),
			'phone' => mysqli_real_escape_string($db->conn, $phone),
			'gender' => mysqli_real_escape_string($db->conn, $gender),
			'status' => mysqli_real_escape_string($db->conn, $status),
			'title' => mysqli_real_escape_string($db->conn, $title),
			'dep_id' => mysqli_real_escape_string($db->conn, $dep),
			'shift' => mysqli_real_escape_string($db->conn, $shift),
			'salary' => mysqli_real_escape_string($db->conn, $salary)
		
		);
		$query = $db->insert_query('doctors', $data);
		echo 'Data inserted Successfull';
	}

	if($_POST['action'] == "nrinsert") {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$shift = $_POST['shift'];
		$dep = $_POST['dep'];
		$salary = $_POST['salary'];
		$data = array(
			'name' => mysqli_real_escape_string($db->conn, $name),
			'phone' => mysqli_real_escape_string($db->conn, $phone),
			'gender' => mysqli_real_escape_string($db->conn, $gender),
			'status' => mysqli_real_escape_string($db->conn, $status),
			'shift' => mysqli_real_escape_string($db->conn, $shift),
			'dep' => mysqli_real_escape_string($db->conn, $dep),
			'salary' => mysqli_real_escape_string($db->conn, $salary)
		
			
		);
		//var_dump($data);
		$query = $db->insert_query('nurses', $data);
		echo 'Data inserted Successfull';
	}

	/* this process will insert a new room */
	if($_POST['action'] == "insertroom") {
		$roomno = $_POST['roomno'];
		$floor = $_POST['floorid'];
		$beds = $_POST['beds'];
		$data = array(
			'room_no' => mysqli_real_escape_string($db->conn, $roomno),
			'floor_id' => mysqli_real_escape_string($db->conn, $floor),
			'beds' => mysqli_real_escape_string($db->conn, $beds)
		);
		$query = $db->insert_query('rooms', $data);
		echo 'Data inserted Successfull';
	}

	/* this process will insert a assingen patient */
	if(isset($_POST['assaction'])) {
		$patient_id = $_POST['patient_id'];
		$doctor_id = $_POST['doctor_id'];
		$data = array(
			'patient_id' => mysqli_real_escape_string($db->conn, $patient_id),
			'doctor_id' => mysqli_real_escape_string($db->conn, $doctor_id)
		);
		$query = $db->insert_query('assign', $data);
		$update ="UPDATE patient SET field = 1 where id = $patient_id";
		$excute =$db->update_field($update);
		echo 'Data inserted Successfull';
	}

 ?>