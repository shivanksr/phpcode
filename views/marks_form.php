<?php
	session_start();
    
	include("../partials/header.html");

	include("../partials/navbar.html");
?>

<div class = "container">
	<div class = "row justify-content-center m-5">
		<div class = "col md-1 card w-20">
			<div class = "card-body">
				<form method = "post" action = "new_marks.php" name="new_student">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Chemistry</span>
					  </div>
					  <input class = "form-control" type = "number" name = "chemistry">
					  <div class="input-group-append">
						<span class="input-group-text">/100</span>
					  </div>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Physics</span>
					  </div>
					  <input class = "form-control" type = "number" name = "physics" required >
					  <div class="input-group-append">
						<span class="input-group-text">/100</span>
					  </div>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Biology</span>
					  </div>
					  <input class = "form-control" type = "number" name = "biology" required >
					  <div class="input-group-append">
						<span class="input-group-text">/100</span>
					  </div>
					</div>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">English</span>
					  </div>
					  <input class = "form-control" type = "number" name = "english" required >
					  <div class="input-group-append">
						<span class="input-group-text">/100</span>
					  </div>
					</div> 
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Math</span>
					  </div>
					  <input class = "form-control" type = "number" name = "math" required >
					  <div class="input-group-append">
						<span class="input-group-text">/100</span>
					  </div>
					</div>
					<input type = "submit" class="btn btn-dark" style="align:center" name="submit_student_form" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include("../partials/footer.html");


?>
