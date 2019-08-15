 <h1>Products</h1>
        <hr>
        <p>View All Products.</p>
		
		<?php
try{
include_once("db.php"); 

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo '<div class="row">';
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo '<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div >
              <div >
                <div class="prodimg"><img src="'.$row["imgpath"].'" /><img src="'.$row["qrpath"].'" /></div> 
				<div class="mr-5"><strong> '.$row["name"].'</strong></div></div>
				<div class="card-footer clearfix small z-1" >
                <div ><strong>Description:</strong> '.$row["description"].'</div>
                <div >
					<strong>Health:</strong> '.$row["health"].'
                </div>
				<div >
					<strong>Status:</strong> '.$row["status"].'
                </div>
				<div >
					<strong>Content:</strong> '.$row["content"].'
                </div>
				<div >
					<strong>Nutrition:</strong> '.$row["nutrition"].'
                </div>
				<div >
					<strong>Ingredients:</strong> '.$row["ingredients"].'
                </div>
				<div >
					<strong>Allergens:</strong> '.$row["allergens"].'
                </div>
              </div>
            </div>
          </div>
		  ';
		
		
        
    }
	echo "</div>";
} else {
    echo "0 results";
}
$conn->close();
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
<br><br>

          
                
               
              
              