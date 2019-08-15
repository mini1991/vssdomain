    <h1>Allergence</h1>
        <hr>
		
		<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            View All Allergence.</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
				<tr><th>ID</th><th>Name</th><th>Description</th>
				</thead>
                <tfoot>
                  <tr><th>ID</th><th>Name</th><th>Description</th>
				 </tfoot>
                <tbody>
                  
		
			<?php
try{
include_once("db.php"); 

$sql = "SELECT * FROM allergies";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["id"]. " </td><td> " . $row["name"]. " </td><td> " . $row["description"]." </td></tr>";
    }
	
} else {
    echo "0 results";
}
$conn->close();
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}


?>

</tbody>
              </table>
            </div>
          </div></div>
          </div>