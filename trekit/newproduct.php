<?php
    include_once("db.php");    
    
	$name=''; $description=''; $health=''; $status=''; $content=''; $nutrition=''; $ingredients=''; $allergens='';
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name =$_POST["name"];
		$description=$_POST["description"];
		$health=$_POST["health"];
		$status=$_POST["status"];
		$content=$_POST["content"];
		$nutrition=$_POST["nutrition"];
		$ingredients=$_POST["ingredients"];
		$allergens=$_POST["allergens"];
	}else{
		$name =$_GET["name"];
		$description=$_GET["description"];
		$health=$_GET["health"];
		$status=$_GET["status"];
		$content=$_GET["content"];
		$nutrition=$_GET["nutrition"];
		$ingredients=$_GET["ingredients"];
		$allergens=$_GET["allergens"];
	}
        // Check that data was sent to the mailer.
        if ( !empty($name)) {
            
		$allergensval = implode(",",$allergens);


        $sql = "INSERT INTO products( name, description, health, status, content, nutrition, ingredients, allergens) VALUES ('$name', '$description', '$health', '$status', '$content', '$nutrition', '$ingredients', '$allergensval')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo '<div class="alert alert-success"><strong>Success!</strong> Inserted Successfully.</div>';
				
        } else {
            echo '<div class="alert alert-danger"><strong>Error!</strong> Value not saved.</div>';
				
        }
		}
?>
