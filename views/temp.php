<?php
	include("../partials/header.html");
	include("../partials/navbar.html");
?>
<body>
<div class = "container">
	<div class = "row justify-content-center m-4">
		<div class="card" style="width: 40rem;">
		  <div class="card-header">
			<div>Student Name Div Class</div>
		  </div>
		 <div class="card-body">
		  <button class="btn btn-primary m-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    		Details
  		  </button>
			<div class="collapse" id="collapseExample">
			  <div class="card card-body m-2">
				Student Details
			  </div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">First</th>
					  <th scope="col">Last</th>
					  <th scope="col">Handle</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <th scope="row">1</th>
					  <td>Mark</td>
					  <td>Otto</td>
					  <td>@mdo</td>
					</tr>
					<tr>
					  <th scope="row">2</th>
					  <td>Jacob</td>
					  <td>Thornton</td>
					  <td>@fat</td>
					</tr>
					<tr>
					  <th scope="row">3</th>
					  <td colspan="2">Larry the Bird</td>
					  <td>@twitter</td>
					</tr>
				  </tbody>
				</table>
			</div>
		  	
		</div>
</div>
	</div>
</div>
</body>

<?

	include("../partials/footer.html");


?>
