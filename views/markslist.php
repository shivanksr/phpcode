<?php
	session_start();
	include("../partials/header.html");
	include("../partials/navbar.html");
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['student_id']) && !isset($_GET['s_id'])){ 
    echo '<div class="alert alert-warning">Invalid! Redirecting to main page.</div>';
	header("Refresh: 1; URL=/chromatus_test/views/main.php");
    exit;
}
else{
	if(isset($_GET['s_id'])){
		$s_id = $_GET['s_id'];
	}
	else{
		$s_id = $_SESSION['student_id'];
	}
}
require_once("../db_conn.php");
?>
<body>
<div class = "container">
	<div class = "row justify-content-center m-4">
		<div class="card" style="width: 40rem;">
		  <div class="card-header">

<?php 

	$query_2 = "SELECT first_name,last_name,dob,address,class,division FROM students WHERE id=?";
	//$s_id = $_SESSION["student_id"];
	if($stmt1 = $mysqli->prepare($query_2)){
		$stmt1->bind_param("i", $s_id);

		/* execute query */
		$stmt1->execute();

		/* Get the result */
	   $stmt1->bind_result($fname, $lname,$dob, $address, $class, $division);

	   /* Get the number of rows */
		while ($stmt1->fetch()) {
			echo "<div>" . $fname . " " .$lname ." [ ".$class . "-" .$division . " ]" ."</div>";
			echo "</div><div class='card-body'><button class='btn btn-primary m-2' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>Personal Details</button>";

			echo "<div class='collapse' id='collapseExample'><div class='card card-body m-2'>
				<ul class='list-group list-group-flush'>";
			echo "<li class='list-group-item'> Date of birth : " .$dob. "</li>";
			echo "<li class='list-group-item'> Address : " .$address. "</li>";
			echo "</ul></div></div>";
		}
		$stmt1->close();
	}
	else{
		echo $mysqli->error;
	}
	
?>
		
			<div class="table-responsive">
				<table class="table table-hover">
				  <thead>
					<tr>
					  <th scope="col">Subject</th>
					  <th scope="col">Marks</th>
					  <th scope="col">Percentage</th>
					</tr>
				  </thead>
				  <tbody>
					

<?php

	//$s_id = $_SESSION["student_id"];
	$query_1 = "SELECT subject,marks FROM marks WHERE student_id=?";
	$total = 0;
	if($stmt = $mysqli->prepare($query_1)){
	/* create a prepared statement */
	
		/* bind parameters for markers */
		$stmt->bind_param("i", $s_id);

		/* execute query */
		$stmt->execute();

		/* bind result variables */
		$stmt->bind_result($subject, $marks);
		

		/* fetch value */
		
		while ($stmt->fetch()) {
			echo "<tr>";
			echo "<td>".$subject."</td>";
			echo "<td>".$marks."</td>";
			$total = $total + $marks;
			echo"</tr>";
		}
	
		$stmt->free_result();

		/* close statement */
		$stmt->close();
	}
	$percent = $total/5;	
	echo "<tr>";
	echo "<td>Total</td>";
	echo "<td>".$total."</td>";
	echo "<td>".$percent."%</td>";
	echo "</tr>";
	
	/* close connection */	
?>
					
			<!--		
					-->
				  </tbody>
				</table>
			</div>
		  	
		</div>
</div>
	</div>
</div>
</body>

<?
	session_unset();

	// destroy the session
	session_destroy();

	include("../partials/footer.html");


?>
