<?php
session_start();
    
require_once("../db_conn.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){
	echo "In Post";

    $dob = $_POST["dob"];
    strval( date('Y/m/d', strtotime($dob)));
	echo $dob;

    // Prepare an insert statement
     $stmt = $mysqli -> prepare("INSERT INTO students (first_name, last_name, dob, address, class, division) values (?,?,?,?,?,?);");
    
     $stmt -> bind_param("ssssss", $param_first_name, $param_last_name, $param_dob, $param_address, $param_class, $param_division);


	echo "Binded params";
        
        // Set parameters
		$param_first_name = $_POST["first_name"];
		$param_last_name = $_POST["last_name"];
        $param_dob=$dob;
        $param_address=$_POST["address"];
        $param_class=$_POST["class"];
        $param_division=$_POST["division"];


    // Attempt to execute the prepared statement
        if($stmt -> execute()){
            // Redirect to home page
		$last_id = $mysqli->insert_id;
		$_SESSION['student_id'] = $last_id;
        header('Location: /chromatus_test/views/marks_form.php');
		exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
		
     // Close statement
    $stmt->close();
    


// Close connection
$mysqli->close();
}


?>
