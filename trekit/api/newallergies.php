<?php
    include_once("db.php");    
    
	$desc='';
	$name='';
	//echo "Page Added";
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name =mysqli_real_escape_string($conn,strip_tags(trim($_POST["name"])));
		$desc=mysqli_real_escape_string($conn,strip_tags(trim($_POST["desc"])));
		
	}else{
		$name =mysqli_real_escape_string($conn,strip_tags(trim($_GET["name"])));
		$desc=mysqli_real_escape_string($conn,strip_tags(trim($_GET["desc"])));
	}

        // Check that data was sent to the mailer.
        if ( !empty($name) AND !empty($desc) ) {

			$sql = "INSERT INTO allergies( name, description) VALUES ('$name','$desc')";

			if ($conn->query($sql) === TRUE) {
				$last_id = $conn->insert_id;
				echo '<div class="alert alert-success"><strong>Success!</strong> Inserted Successfully.</div>';
				
			} else {
				echo '<div class="alert alert-danger"><strong>Error!</strong> Value not saved.</div>';
				//http_response_code(403);
			}
		}
?>
