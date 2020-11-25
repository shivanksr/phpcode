<?php

	include("../partials/header.html");

	include("../partials/navbar.html");
	require_once("../db_conn.php");

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sid = $_POST["s_id"];
		$stmt = $mysqli -> prepare("SELECT first_name, last_name, dob, address, class, division FROM students where id = ?;");
     	$stmt -> bind_param("i", $sid);
		mysqli_stmt_execute($stmt);
		/* bind result variables */
		$stmt->bind_result($first_name, $last_name, $dob, $address, $class, $division);
		/* fetch value */
		while($stmt->fetch()){
			echo "<div class = 'container'>";
				echo "<div class = 'row justify-content-center m-4'>";
					echo "<div class = 'col md-1 card'>";
						echo "<div class = 'card-body'>";
							echo "<form method = 'post' action = 'update_student.php' name='new_student'>";
								echo "<input class = 'form-control' type = 'text' name = 'first_name' value='".$first_name."' required placeholder='First Name...' ><br>";
								echo "<input class = 'form-control' type = 'text' name = 'last_name' value='".$last_name."' required placeholder='Last Name...' > <br>";
								echo "<textarea class = 'form-control' name = 'address' value='".$address."'  required placeholder='Address...' > </textarea> <br>";
								echo "<input class = 'form-control' type = 'date'  name = 'dob' value='".$dob."'  required placeholder='Date of Birth...' > <br>";
								echo "<input class = 'form-control' type = 'number'  name = 'class' value='".$class."'  required placeholder='Class...' min = '1' max='12' > <br>";
								echo "<input class = 'form-control' type = 'text' name = 'division' value='".$division."'  required placeholder='Division...'> <br>";
								echo "<input type = 'submit' class='btn btn-dark' style='align:center' name='update_student_form' value='Submit'>";
								echo "<input type = 'hidden' name = 's_id' value='".$sid."'>";
							echo "</form>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
		$stmt->close();
	}
	$mysqli->close();

	include("../partials/footer.html");
?>
