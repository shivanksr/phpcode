<?
require_once("../db_conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
$sid = $_POST["s_id"];
$dob = $_POST["dob"];
strval( date('Y/m/d', strtotime($dob)));

$sql ="UPDATE students SET first_name = ?, last_name = ?, class = ?, division = ?, dob = ?, address = ? WHERE id = ? ;";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        
        // Set parameters
        $stmt -> bind_param("ssssssi", $param_first_name, $param_last_name, $param_class, $param_division, $param_dob, $param_address, $sid);
		
		$param_first_name = $_POST["first_name"];
		$param_last_name = $_POST["last_name"];
        $param_dob=$dob;
        $param_address=$_POST["address"];
        $param_class=$_POST["class"];
		echo $param_class;
        $param_division=$_POST["division"];
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
			$stmt -> close();
           header('Location: /chromatus_test/views/view_students.php');
        } 
		else{
			echo $mysqli-> error;
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
	else{
		echo $mysqli-> error;
	}
	

    
    // Close connection
    $mysqli->close();
}

?>
