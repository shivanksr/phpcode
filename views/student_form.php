<?php

	include("../partials/header.html");

	include("../partials/navbar.html");
?>

<div class = "container">
	<div class = "row justify-content-center m-4">
		<div class = "col md-1 card">
			<div class = "card-body">
				<form method = "post" action = "new_student.php" name="new_student">
					<input class = "form-control" type = "text" name = "first_name" required placeholder="First Name..." ><br> 
					<input class = "form-control" type = "text" name = "last_name" required placeholder="Last Name..." > <br>
					<textarea class = "form-control" name = "address" required placeholder="Address..." > </textarea> <br>
					<input class = "form-control" type = "date"  name = "dob" required placeholder="Date of Birth..." > <br>
					<input class = "form-control" type = "number"  name = "class" required placeholder="Class..." min = "1" max="12" > <br>
					<input class = "form-control" type = "text" name = "division" required placeholder="Division..."> <br>
					<input type = "submit" class="btn btn-dark" style="align:center" name="submit_student_form" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>


<?

	include("../partials/footer.html");


?>
