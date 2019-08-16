<!DOCTYPE html>
<html>

<body>
<h1>Users</h1>
        
     	<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
				<tr><th>Name</th><th>Email ID</th><th>Subject</th><th>Message</th></tr>
				</thead>
                
                <tbody>		
<?php
try{
include_once("C:/xampp/htdocs/dbtest/dbconnection.php"); 

$sql = "SELECT * FROM contactus";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. " </td><td>" . $row["subject"]. "</td><td>" . $row["message"]."</td></tr>";
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
          </div>
		  </div>
		  </div> 
         </body>
		 </html>