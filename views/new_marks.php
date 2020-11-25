<?php
session_start();

require_once("../db_conn.php");


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Prepare an insert statement
    $stmt = $mysqli -> prepare("INSERT INTO marks (student_id, subject, marks) values (?,?,?);");
	$param_sid = $_SESSION['student_id'];
//POST["student_id"];
	$param_bio = $_POST["biology"];
    $param_eng = $_POST["english"];
	$param_math = $_POST["math"];
	$param_phys = $_POST["physics"];
	$param_chem = $_POST["chemistry"];
	$array = array(
		0 => array(
		    0 => $param_sid,
		    1 => 'Biology',
			2 => $param_bio
		),
		1 => array(
			0 => $param_sid,
			1 => 'English',
			2 => $param_eng
		),
		2 => array(
			0 => $param_sid,
			1 => 'Math',
			2 => $param_math
		),
		3 => array(
			0 => $param_sid,
			1 => 'Physics',
			2 => $param_phys
		),
		4 => array(
			0 => $param_sid,
			1 => 'Chemistry',
			2 => $param_chem
		)
		
	);
	
	for ($i = 0; $i < 5; ++$i)
	{
		if($stmt){
			$stmt->bind_param("isi", $array[$i][0],$array[$i][1],$array[$i][2]);
			if($stmt->execute()){
				continue;
			}
			else{
				echo("Error description: " . $mysqli -> error);
			}
			//mysqli_stmt_close($stmt);	
		}
	}
	header('Location: /chromatus_test/views/markslist.php');
	
     // Close statement
    
    $stmt->close();

// Close connection
$mysqli->close();
}
?>
