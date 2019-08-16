<h1>Users</h1>
        <hr>
        	<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            View All Allergence.</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
				<tr><th>ID</th><th>Email ID</th><th>Password</th><th>User Name</th><th>Gender</th><th>Age</th><th>Location</th></tr>
				</thead>
                <tfoot>
                  <tr><th>ID</th><th>Email ID</th><th>Password</th><th>User Name</th><th>Gender</th><th>Age</th><th>Location</th></tr>
				 </tfoot>
                <tbody>
                  
		
<?php
try{
include_once("db.php"); 

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td> " . $row["id"]. " </td><td> " . $row["email"]. " </td><td> " . $row["password"]." </td><td> " . $row["name"]. " </td><td> " . $row["gender"]. " </td><td> " . $row["age"]. " </td><td> " . $row["location"]. "</td></tr>";
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