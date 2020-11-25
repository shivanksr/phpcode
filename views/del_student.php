<?
require_once("../db_conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
$sid = $_POST["s_id"];
$marks = "DELETE FROM marks WHERE student_id = ?"; 
$sql = "DELETE FROM students WHERE id = ?";
    
    if($stmt = $mysqli->prepare($marks)){
        // Bind variables to the prepared statement as parameters
        
        // Set parameters
        $stmt -> bind_param("i", $sid);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records deleted successfully. Redirect to landing page
            $stmt->close();
			if($stmt = $mysqli->prepare($sql)){
				$stmt -> bind_param("i", $sid);
				if($stmt->execute()){
					$stmt->close();
					header('Location: /chromatus_test/views/view_students.php');
				}
				else{
            		echo "Oops! Something went wrong. Please try again later.";
        		}
			}

        } 
		else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    
    // Close connection
    $mysqli->close();
}

?>
