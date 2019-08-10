<?php
    include_once("db.php");    
    
	$email ='';
	$password='';
	$name='';
	$age=0;
	$gender='';
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = mysqli_real_escape_string($conn,filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL));
		$password= mysqli_real_escape_string($conn,strip_tags(trim($_POST["password"])));
		$name=mysqli_real_escape_string($conn,strip_tags(trim($_POST["name"])));
		$age=mysqli_real_escape_string($conn,strip_tags(trim($_POST["age"])));
		$gender=mysqli_real_escape_string($conn,strip_tags(trim($_POST["gender"])));
	}else{
		$email = mysqli_real_escape_string($conn,filter_var(trim($_GET["email"]), FILTER_SANITIZE_EMAIL));
		$password= mysqli_real_escape_string($conn,strip_tags(trim($_GET["password"])));
		$name=mysqli_real_escape_string($conn,strip_tags(trim($_GET["name"])));
		$age=mysqli_real_escape_string($conn,strip_tags(trim($_GET["age"])));
		$gender=mysqli_real_escape_string($conn,strip_tags(trim($_GET["gender"])));
	}

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($email) OR empty($password) OR empty($age) OR empty($gender)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! Input Parameters cant be null/empty.";
            exit;
        }


        $sql = "INSERT INTO user(email, name, password, age, gender) VALUES ('$email','$name', '$password', $age, '$gender')";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            echo "Account Created Successfully.";
            
        } else {
            echo "Oops! Something went wrong and we couldn't send your message.";
            http_response_code(403);
        }

?>
