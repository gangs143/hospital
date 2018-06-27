<?php
	include '../../classes/Databases.php';
	$db = new Databases;

    if(isset($_POST['count_users'])) {
        // $users = array();
        $sql = "select count(id) as users from users";
        $result = mysqli_query($db->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $users = array(
                "data"=> $row['users']
            );
            // $users["users"] = $row['users'];
        }

        echo json_encode($users);
    }

    /*=======================| Patient |============================
      ==============================================================
      || this section or block is protected by Patient operations  ||
      ==============================================================
    */
     //dispalaying data into table patient
     if(isset($_POST['patient'])) {
         $output = '';
         $post_data = $db->execute_limitData('patient', 10, 'field', 0);
         foreach ($post_data as $post) {
             $output .= '<tr>
                 <td>'.$post["id"].'</td>
                 <td>'.$post["name"].'</td>
                 <td>'.$post["address"].'</td>
                 <td>'.$post["status"].'</td>
                 <td>'.$post["age"].'</td>
                 <td>'.$post["gender"].'</td>
                 <td>'.$post["phone"].'</td>
                 <td>'.$post["created_at"].'</td>
                 <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                     <a class="btn-assign" id="'.$post["id"].'"><i class="fa fa-user fa-lg"></i></a>
                 </td>
             </tr>';
         }
         echo $output;
     }

     if(isset($_POST['searchpatient'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $query = "SELECT * FROM patient WHERE (name LIKE '%$search%' or
            phone LIKE '%$search%' or id LIKE '%$search%') AND field = 0 ORDER BY id DESC";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
            <td>'.$post["name"].'</td>
            <td>'.$post["address"].'</td>
            <td>'.$post["status"].'</td>
            <td>'.$post["age"].'</td>
            <td>'.$post["gender"].'</td>
            <td>'.$post["phone"].'</td>
            <td>'.$post["created_at"].'</td>
            <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                    <a class="btn-assign" id="'.$post["id"].'"><i class="fa fa-user fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    if(isset($_POST['limitpatient'])) {
        $limit = $_POST['limitpatient'];
        $output = '';
        $post_data = $db->execute_limitData('patient', 10, 'field', 0);
        foreach ($post_data as $post) {
            $output .= '<tr>
                 <td>'.$post["id"].'</td>
                 <td>'.$post["name"].'</td>
                 <td>'.$post["address"].'</td>
                 <td>'.$post["status"].'</td>
                 <td>'.$post["age"].'</td>
                 <td>'.$post["gender"].'</td>
                 <td>'.$post["phone"].'</td>
                 <td>'.$post["created_at"].'</td>
                 <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                     <a class="btn-assign" id="'.$post["id"].'"><i class="fa fa-user fa-lg"></i></a>
                 </td>
             </tr>';
        }
        echo $output;
    }
     if(isset($_POST['updatepatient'])) {
        //echo "some metssage about";
         $id = $_POST['id'];
         $output = array();

         $post_data = $db->execute_query('patient', $id);
         foreach ($post_data as $row) {
             $output["name"] = $row['name'];
             $output["phone"] = $row['phone'];
             $output["gender"] = $row['gender'];
             $output["age"] = $row['age'];
             $output["status"] = $row['status'];
             $output["address"] = $row['address'];


         }
         
         //echo json_encode($output);
      }
    /*=======================| Nurses |=============================
      ==============================================================
      || this section or block is protected by Nurses operations  ||
      ==============================================================
    */
     if(isset($_POST['nrsearch'])) {
        $output = '';
        $post_data = $db->execute_query('nurses', null);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["name"].'</td>
                <td>'.$post["phone"].'</td>
                <td>'.$post["gender"].'</td>
                <td>'.$post["status"].'</td>
                <td>'.$post["shift"].'</td>
                <td>'.$post["dep"].'</td>
                <td>'.$post["salary"].'</td>
                 <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    /* select one nurse information */
    if(isset($_POST['nrselect'])) {
        $idnr = $_POST['id'];
        $output = array();
        $post_data = $db->execute_query('nurses', $idnr);
        foreach ($post_data as $row) {
            $output["name"] = $row['name'];
            $output["phone"] = $row['phone'];
            $output["gender"] = $row['gender'];
            $output["status"] = $row['status'];
            $output["shift"] = $row['shift'];
            $output["dep"] = $row['dep'];
            $output["salary"] = $row['salary'];
        }
        echo json_encode($output);
     }

        /* limit for the nurses block */
     if(isset($_POST['limitnurses'])) {
        $limit = $_POST['limitnurses'];
        $output = '';
        $post_data = $db->execute_limit('nurses', $limit);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
            <td>'.$post["name"].'</td>
            <td>'.$post["phone"].'</td>
            <td>'.$post["gender"].'</td>
            <td>'.$post["status"].'</td>
            <td>'.$post["shift"].'</td>
            <td>'.$post["dep"].'</td>
            <td>'.$post["salary"].'</td>
             <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                 </td>
             </tr>';
        }
        echo $output;
    }

    /* search for the nurses block */
     if(isset($_POST['nursearch'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $query = "SELECT * FROM nurses WHERE name LIKE '%$search%' or
            phone LIKE '%$search%' or id LIKE '%$search%' ORDER BY id DESC";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
                <td>'.$post["name"].'</td>
                <td>'.$post["phone"].'</td>
                <td>'.$post["gender"].'</td>
                <td>'.$post["status"].'</td>
                <td>'.$post["shift"].'</td>
                <td>'.$post["dep"].'</td>
                <td>'.$post["salary"].'</td>
            <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    /*=======================| Doctors |============================
      ==============================================================
      || this section or block is protected by doctor operations   ||
      ==============================================================
    */
    if(isset($_POST['doctor'])) {
		$output = '';
        $query = "SELECT dr.id, dr.name, department.name AS depname, dr.phone, dr.gender, dr.status, dr.shift,
         dr.salary FROM doctors AS dr, department WHERE dr.dep_id = department.id";
		$post_data = $db->execute_limit_query($query, 10);
    	foreach ($post_data as $post) {
    		$output .= '<tr>
    			<td>'.$post["id"].'</td>
    			<td>'.$post["name"].'</td>
                <td>'.$post["depname"].'</td>
				<td>'.$post["phone"].'</td>
				<td>'.$post["gender"].'</td>
				<td>'.$post["status"].'</td>
				<td>'.$post["shift"].'</td>
				<td>$ '.$post["salary"].'</td>
    			 <td>
    				<a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
    				<a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
    			</td>
    		</tr>';
    	}
    	echo $output;
	}

    /* select one doctor information */
        if(isset($_POST['updatedoctor'])) {
            $id = $_POST['id'];
            $output = array();

            $post_data = $db->execute_query('doctors', $id);
            foreach ($post_data as $row) {
                $output["name"] = $row['name'];
                $output["phone"] = $row['phone'];
                $output["gender"] = $row['gender'];
                $output["status"] = $row['status'];
                $output["title"] = $row['title'];
                $output["dep"] = $row['dep'];
                $output["shift"] = $row['shift'];
                $output["salary"] = $row['salary'];
            }
            echo json_encode($output);
         }

    //doctor search
    if(isset($_POST['searchdoctor'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $query = "SELECT * FROM doctors WHERE name LIKE '%$search%' or
            phone LIKE '%$search%' or id LIKE '%$search%' ORDER BY id DESC";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
            <td>'.$post["name"].'</td>
            <td>'.$post["phone"].'</td>
            <td>'.$post["gender"].'</td>
            <td>'.$post["status"].'</td>
            <td>'.$post["shift"].'</td>
            <td>$ '.$post["salary"].'</td>
            <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    // limit the rows to display
    if(isset($_POST['limitdoctor'])) {
        $limit = $_POST['limitdoctor'];
        $output = '';
        //$post_data = $db->execute_limit('doctors', $limit);
        $query = "SELECT dr.id, dr.name, department.name AS depname, dr.phone, dr.gender, dr.status, dr.shift,
         dr.salary FROM doctors AS dr, department WHERE dr.dep_id = department.id";
        $post_data = $db->execute_limit_query($query, $limit);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
            <td>'.$post["name"].'</td>
            <td>'.$post["depname"].'</td>
            <td>'.$post["phone"].'</td>
            <td>'.$post["gender"].'</td>
            <td>'.$post["status"].'</td>
            <td>'.$post["shift"].'</td>
            <td>$ '.$post["salary"].'</td>
                 <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                 </td>
             </tr>';
        }
        echo $output;
    }

    /*=======================| Assign |=============================
      ==============================================================
      || this section or block is protected by assign operations  ||
      ==============================================================
    */

    if(isset($_POST['assign'])) {
        $output = '';
        $query = "SELECT assign.id, patient.name AS patient, doctors.name AS doctor, examine, symptoms 
        FROM assign, patient, doctors WHERE assign.patient_id = patient.id AND assign.doctor_id = doctors.id
        AND patient.field = 1";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["patient"].'</td>
                <td>'.$post["doctor"].'</td>
                <td>'.$post["examine"].'</td>
                <td>'.$post["symptoms"].'</td>
                 <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    /* select one assign information */
    if(isset($_POST['updateassign'])) {
        $id = $_POST['id'];
        $output = array();

        $post_data = $db->execute_query('assign', $id);
        foreach ($post_data as $row) {
            $output["patient_id"] = $row['patient_id'];
        }
        echo json_encode($output);
     }

    // limit the rows to display
    if(isset($_POST['asslimit'])) {
        $limit = $_POST['asslimit'];
        $output = '';
        $query = "SELECT assign.id, patient.name AS patient, doctors.name AS doctor, examine, symptoms FROM assign, patient, doctors WHERE assign.patient_id = patient.id AND assign.doctor_id = doctors.id";
        $post_data = $db->execute_limit_query($query, $limit);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
            <td>'.$post["patient"].'</td>
            <td>'.$post["doctor"].'</td>
            <td>'.$post["examine"].'</td>
            <td>'.$post["symptoms"].'</td>
                 <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                 </td>
             </tr>';
        }
        echo $output;
    }

    if(isset($_POST['updateassign'])) {
        $id = $_POST['id'];
        $output = '';
        $output .= '<thead>
            <th>Info</th>
            <th>Description</th>
        </thead>';
        $post_data = $db->execute_query('patient', $id);
        foreach ($post_data as $row) {
         $output .='<tr><td>Name:</td> <td>'.$row["name"].'</td></tr>
             <tr><td>Phone:</td> <td>'.$row["phone"].'</td></tr>
             <tr><td>Age:</td> <td>'.$row["age"].'</td></tr>
             <tr><td>Status:</td> <td>'.$row["status"].'</td></tr>
             <tr><td>Address:</td> <td>'.$row["address"].'</td></tr>
         ';
        }
      echo  $output;
     }

     // lists the doctors
     if(isset($_POST['docassign'])) {
        $output = '';
        $query = "SELECT id, name from doctors";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<option value="'.$post["id"].'">'.$post["name"].'</option>';
        }
        echo $output;
    }

    /*=======================| Room |===============================
      ==============================================================
      || this section or block is protected by Room operations    ||
      ==============================================================
    */
    /* this section or block is protected by room operations */

    if(isset($_POST['loadroom'])) {
        $output = '';
        $query = "SELECT rooms.id, rooms.room_no, floor.name AS floor, rooms.beds from rooms, floor WHERE rooms.id = floor.id ORDER BY id DESC";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["room_no"].'</td>
                <td>'.$post["floor"].'</td>
                <td>'.$post["beds"].'</td>
                <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }

    if(isset($_POST['floor'])) {
        $output = '';
        $post_data = $db->execute_no_order('floor');
        foreach ($post_data as $post) {
            $output .= '<option value="'.$post["id"].'">'.$post["name"].'</option>';
        }
        echo $output;
     }

    /*=======================| Floor |==============================
      ==============================================================
      || this section or block is protected by Floor operations   ||
      ==============================================================
    */

     if(isset($_POST['loadfloor'])) {
        $output = '';
        $query = "SELECT id, name from floor";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["name"].'</td>
                <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }
    if(isset($_POST['updatefloor'])) {
        $id = $_POST['id'];
        $output = array();

        $post_data = $db->execute_query('floor', $id);
        foreach ($post_data as $row) {
            $output["id"] = $row['id'];
            $output["floor"] = $row['floor'];
        }
        echo json_encode($output);
     }
     if(isset($_POST['searchfloor'])) {
        $search = mysqli_real_escape_string($db->conn, $_POST['search']);
        $output = '';
        $query = "SELECT * FROM floor WHERE name LIKE '%$search%' or id LIKE '%$search%' ORDER BY id DESC";
        $post_data = $db->execute_sql($query);
        foreach ($post_data as $post) {
            $output .= '<tr>
            <td>'.$post["id"].'</td>
            <td>'.$post["name"].'</td>
            <td>
                    <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                    <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                </td>
            </tr>';
        }
        echo $output;
    }
    if(isset($_POST['limitfloor'])) {
        $limit = $_POST['limitfloor'];
        $output = '';
        $post_data = $db->execute_limit('floor', $limit);
        foreach ($post_data as $post) {
            $output .= '<tr>
                 <td>'.$post["id"].'</td>
                 <td>'.$post["name"].'</td>
                 <td>
                     <a class="btn-edit" id="'.$post["id"].'"><i class="fa fa-edit fa-lg"></i></a>
                     <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                 </td>
             </tr>';
        }
        echo $output;
    }
     if(isset($_POST['updatefloor'])) {
         $id = $_POST['id'];
         $output = array();

         $post_data = $db->execute_query('floor', $id);
         foreach ($post_data as $row) {
             $output["id"] = $row['id'];
             $output["name"] = $row['name'];
         }
         echo json_encode($output);
      }

			/*=======================| Floor |==============================
	      ==============================================================
	      || this section or block is protected by Floor operations   ||
	      ==============================================================
	    */
     //selects the color
     if(isset($_POST['color'])) {
        $output = '';
        $post_data = $db->execute_query("colors", null);
        foreach ($post_data as $post) {
            $output .= '
                <li id="colorName" name="'.$post["hexa"].'"><a href="#">'.$post["name"].' <span class="label" style="background-color: '.$post["hexa"].'">Alert Badge</span></a></li>
            ';
        }
        echo $output;
    }
    	/*=======================| history |==============================
	      ==============================================================
	      || this section or block is protected by Floor operations   ||
	      ==============================================================
        */
        if(isset($_POST['history'])) {
            $output = '';
            $post_data = $db->execute_query('history', null);
            foreach ($post_data as $post) {
                $output .= '<tr>
                <td>'.$post["id"].'</td>
                <td>'.$post["patient_id"].'</td>
                <td>'.$post["doctor_id"].'</td>
                <td>'.$post["gender"].'</td>
                <td>'.$post["status"].'</td>
                <td>'.$post["examine"].'</td>
                <td>'.$post["symptoms"].'</td>
                <td>'.$post["created_at"].'</td>
                <td>
                        <a class="btn-delete" id="'.$post["id"].'"><i class="fa fa-trash fa-lg"></i></a>
                    </td>
                </tr>';
            }
            echo $output;
        }
 ?>