<?php

include_once("db.php");

    
		$email = '';
		$pwd = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$email = mysqli_real_escape_string($conn,filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL));
			$pwd= mysqli_real_escape_string($conn,strip_tags(trim($_POST["password"])));
		}else{
			$email = mysqli_real_escape_string($conn,filter_var(trim($_GET["email"]), FILTER_SANITIZE_EMAIL));
			$pwd= mysqli_real_escape_string($conn,strip_tags(trim($_GET["password"])));
		}

	 // Check that data was sent to the mailer.
        if ( empty($email) || empty($pwd)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! UserName or Password Is Empty";
			//echo "email:".$email;echo "password:".$pwd;
            exit;
        }

		$sql = "SELECT * FROM user WHERE email='$email' and password='$pwd'";

		$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	   $myObj->email=$row["email"];
	   $myObj->name=$row["name"];
	   $myObj->age=$row["age"];
	   $myObj->gender=$row["gender"];
	   $myObj->location=$row["location"];	   
	   $myObj->active=$row["active"];
	   $myJSON = json_encode($myObj);
	   echo $myJSON;
    }
} else {
    http_response_code(400);
		    echo "Invalid Credentials " . $conn->error;
}

?>