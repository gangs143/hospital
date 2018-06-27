<?php 
	include '../../classes/Databases.php'; 
	$db = new Databases;

	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$data = array(
			'username' => mysqli_real_escape_string($db->conn, $username),
			'password' => mysqli_real_escape_string($db->conn, $password),
			'email' => mysqli_real_escape_string($db->conn, $email)
		);

		$where_condition = array(
			'id' => mysqli_real_escape_string($db->conn, $id)
		);
		if($db->update_query("users", $data, $where_condition)){
			echo "updated data successfull";
		}
		else {
			echo "waxba lama xarayn";
		}
	}

	//patient update
	if(isset($_POST['patient'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$status = $_POST['status'];
		$address = $_POST['address'];
		$data = array(
			'name' => mysqli_real_escape_string($db->conn, $name),
			'phone' => mysqli_real_escape_string($db->conn, $phone),
			'gender' => mysqli_real_escape_string($db->conn, $gender),
			'age' => mysqli_real_escape_string($db->conn, $age),
			'status' => mysqli_real_escape_string($db->conn, $status),
			'address' => mysqli_real_escape_string($db->conn, $address)
		);

		$where_condition = array(
			'id' => mysqli_real_escape_string($db->conn, $id)
		);
		if($db->update_query("patient", $data, $where_condition)){
			echo "updated data successfull";
		}
		else {
			echo $db->update_query("users", $data, $where_condition);
			echo "waxba lama xarayn";
		}
	}

	//rrom update
	if(isset($_POST['rooms'])) {
		$id = $_POST['id'];
		$room_no = $_POST['room_no'];
		$floor_id = $_POST['floor_id'];
		$no_bed = $_POST['no_bed'];
		$updater = $_POST['updater'];
		$data = array(
			'room_no' => mysqli_real_escape_string($db->conn, $room_no),
			'floor_id' => mysqli_real_escape_string($db->conn, $floor_id),
			'no_bed' => mysqli_real_escape_string($db->conn, $no_bed),
			'updater' => mysqli_real_escape_string($db->conn, $updater)
		);

		$where_condition = array(
			'id' => mysqli_real_escape_string($db->conn, $id)
		);
		if($db->update_query("rooms", $data, $where_condition)){
			echo "updated data successfull";
		}
		else {
			echo $db->update_query("rooms", $data, $where_condition);
			echo "waxba lama xarayn";
		}
	}

	//assign update
	if(isset($_POST['assign'])) {
		$id = $_POST['id'];
		$patient_id = $_POST['patient_id'];
		$examine = $_POST['examine'];
		$symptoms = $_POST['symptoms'];
		$data = array(
			'examine' => mysqli_real_escape_string($db->conn, $examine),
			'symptoms' => mysqli_real_escape_string($db->conn, $symptoms)
		);

		$where_condition = array(
			'id' => mysqli_real_escape_string($db->conn, $id)
		);
		if($db->update_query("assign", $data, $where_condition)){
			$UpdateState = "UPDATE patient SET field = 0 WHERE id = $patient_id";
			$excute = $db->update_sql($UpdateState);
			$query = "INSERT INTO history (patient_id, doctor_id, examine, symptoms) SELECT patient_id, 
			doctor_id, examine, symptoms FROM assign WHERE id = $id";
			$result = $db->update_sql($query);
			echo "updated data successfull";
		}
		else {
			echo "waxba lama xarayn";
		}
	}

	if(isset($_POST['doctor'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$status = $_POST['status'];
		$shift = $_POST['shift'];
		$salary = $_POST['salary'];
		$data = array(
			//var_dump($data);
			'name' => mysqli_real_escape_string($db->conn, $name),
			'phone' => mysqli_real_escape_string($db->conn, $phone),
			'gender' => mysqli_real_escape_string($db->conn, $gender),
			'status' => mysqli_real_escape_string($db->conn, $status),
			'shift' => mysqli_real_escape_string($db->conn, $shift),
			'salary' => mysqli_real_escape_string($db->conn, $salary)
		);

		$where_condition = array(
			'id' => mysqli_real_escape_string($db->conn, $id)
		);
		if($db->update_query("doctors", $data, $where_condition)){
			echo "updated data successfull";
		}
		else {
			echo $db->update_query("doctors", $data, $where_condition);
			echo "waxba lama xarayn";
		}
	}
//update nurse files 
if(isset($_POST['nrupdate'])) {
	$id = $_POST['id'];
	$nrname = $_POST['name'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	$shift = $_POST['shift'];
	$dep = $_POST['dep'];
	$salary = $_POST['salary'];
	$data = array(
		'name' => mysqli_real_escape_string($db->conn, $nrname),
		'phone' => mysqli_real_escape_string($db->conn, $phone),
		'gender' => mysqli_real_escape_string($db->conn, $gender),
		'status' => mysqli_real_escape_string($db->conn, $status),
		'shift' => mysqli_real_escape_string($db->conn, $shift),
		'dep' => mysqli_real_escape_string($db->conn, $dep),
		'salary' => mysqli_real_escape_string($db->conn, $salary)
	);

	$where_condition = array(
		'id' => mysqli_real_escape_string($db->conn, $id)
	);
	if($db->update_query("nurses", $data, $where_condition)){
		echo "updated data successfull";
	}
	else {
		echo $db->update_query("nurses", $data, $where_condition);
		echo "waxba lama xarayn";
	}
}
?>

