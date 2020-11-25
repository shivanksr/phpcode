
<?php
	session_start();
	include("../partials/header.html");
	include("../partials/navbar.html");
 
require_once("../db_conn.php");
?>
<body>
<div class = "container">
	<div class = "row justify-content-center m-4">
		<div class="card" style="width: 40rem;">
		  <div class="card-header">
			<div class="table-responsive">
				<table class="table table-hover">
				  <thead>
					<tr>
					  <th scope="col">Student Name</th>
					  <th scope="col">Class</th>
					  <th scope="col">Division</th>
					<th scope="col">Date of Birth</th>
					<th scope="col">Address</th>
					<th scope="col">View Marksheet</th>
					<th scope="col">Delete</th>
					<th scope="col">Edit</th>
					</tr>
				  </thead>
				  <tbody>
<?php
	$query = "SELECT id, first_name, last_name, class, division, dob, address FROM students";
		$result = $mysqli->query($query);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {		
			echo "<tr>";
			echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
			echo "<td>".$row["class"]."</td>";
			echo "<td>".$row["division"]."</td>";
			echo "<td>".$row["dob"]."</td>";
			echo "<td>".$row["address"]."</td>";
			echo "<td> <a href='markslist.php?s_id=".$row["id"]."' role='button' class = 'btn btn-dark' > VIEW </a>";
			echo "<td><form action='del_student.php' method = 'post'> <button class='btn btn-dark' type='submit' value = '". $row['id'] ."' name = 's_id'>DELETE</button> </form></td>" ;
			echo "<td><form action='edit_student.php' method = 'post'><button class='btn btn-dark' type='submit' value = '". $row['id'] ."' name = 's_id'>EDIT</button> </form></td>" ;
			echo "</div>"; 
			echo "</div>";
		}
	
	}

	/* close connection */
	$mysqli->close();
?>

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
