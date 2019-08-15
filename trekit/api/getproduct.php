<?php

include_once("db.php");

    
		$productid = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$productid = $_POST["productid"];
		}else{
			$productid = $_GET["productid"];
		}

	 // Check that data was sent to the mailer.
        if ( empty($productid)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! Product ID Is Empty";
			//echo "email:".$email;echo "password:".$pwd;
            exit;
        }

		$sql = "SELECT * FROM products WHERE id=".$productid;

		$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	   $myObj->name=$row["name"];
	   $myObj->content=$row["content"];
	   $myObj->health=$row["health"];
	   $myObj->status=$row["status"];
	   $myObj->url=$row["imgpath"];	   
	   $myObj->nutrition=$row["nutrition"];
	   $myObj->ingredients=$row["ingredients"];
	   $myObj->allergens=$row["allergens"];
	   $myObj->description=$row["description"];
	   $myJSON = json_encode($myObj);
	   echo $myJSON;
    }
} else {
    http_response_code(400);
		    echo "Invalid Credentials " . $conn->error;
}

?>