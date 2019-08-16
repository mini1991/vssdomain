<?php
    include_once("db.php");    
    
	$name=''; $description=''; $health=''; $status=''; $content=''; $nutrition=''; $ingredients=''; $allergens='';$filename='';
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name =mysqli_real_escape_string($conn,strip_tags(trim($_POST["name"])));
		$description=mysqli_real_escape_string($conn,strip_tags(trim($_POST["description"])));
		$health=mysqli_real_escape_string($conn,strip_tags(trim($_POST["health"])));
		$status=mysqli_real_escape_string($conn,strip_tags(trim($_POST["status"])));
		$content=mysqli_real_escape_string($conn,strip_tags(trim($_POST["content"])));
		$nutrition=mysqli_real_escape_string($conn,strip_tags(trim($_POST["nutrition"])));
		$ingredients=mysqli_real_escape_string($conn,strip_tags(trim($_POST["ingredients"])));
		$allergens=mysqli_real_escape_string($conn,strip_tags(trim($_POST["allergens"])));
	}else{
		$name =mysqli_real_escape_string($conn,strip_tags(trim($_GET["name"])));
		$description=mysqli_real_escape_string($conn,strip_tags(trim($_GET["description"])));
		$health=mysqli_real_escape_string($conn,strip_tags(trim($_GET["health"])));
		$status=mysqli_real_escape_string($conn,strip_tags(trim($_GET["status"])));
		$content=mysqli_real_escape_string($conn,strip_tags(trim($_GET["content"])));
		$nutrition=mysqli_real_escape_string($conn,strip_tags(trim($_GET["nutrition"])));
		$ingredients=mysqli_real_escape_string($conn,strip_tags(trim($_GET["ingredients"])));
		$allergens=mysqli_real_escape_string($conn,strip_tags(trim($_GET["allergens"])));
	}
        // Check that data was sent to the mailer.
        if ( !empty($name)) {
            
		$allergensval = implode(",",$allergens);


        $sql = "INSERT INTO products( name, description, health, status, content, nutrition, ingredients, allergens) VALUES ('$name', '$description', '$health', '$status', '$content', '$nutrition', '$ingredients', '$allergensval')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo '<div class="alert alert-success"><strong>Success!</strong> Inserted Successfully.</div>';
			$PNG_WEB_DIR = 'img/';
			
			$myObj->productid = $last_id;
			$qrdata = json_encode($myObj);
			$target_file = $PNG_WEB_DIR . basename($_FILES["fileToUpload"]["name"]);		
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$filenameProd = $PNG_WEB_DIR.'prod'.$last_id.$imageFileType;
			$filenameQR = $PNG_WEB_DIR.'qr'.$last_id.'.png';	
			 
			$updatesql = "UPDATE products SET imgpath='$filenameProd',qrpath='$filenameQR' WHERE id=".$last_id;
				if ($conn->query($updatesql) === TRUE) {
					echo "Updated Successfully";
				}
			 
			include "qrcode.php";
			include "fileupload.php";
        } else {
            echo '<div class="alert alert-danger"><strong>Error!</strong> Value not saved.</div>';
				
        }
		
		}
?>
