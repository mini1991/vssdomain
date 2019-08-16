<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "abc123";
$db_name = "mydb";
if ( ! empty( $_POST ) ) {
$user = $_POST["inputEmail"];
$pwd = $_POST["inputPassword"];
echo $user."".$pwd;
    if ( isset( $_POST['inputEmail'] ) && isset( $_POST['inputPassword'] ) ) {
        // Getting submitted user data from database
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		$result=mysqli_query( $conn, "SELECT * FROM adminlogin WHERE Email='$user' AND Password='$pwd' ") ;
		$row = mysqli_fetch_assoc($result);
		if($row) {
		session_start();
	        $_SESSION['user']=$user;
			header("Location: users.php");
			
		}else {
	       
		header("Location: userlogin.html");
		}
		}
		}
		session_destroy();


?>
