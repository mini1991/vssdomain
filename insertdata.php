<html>
<body>
<?php 

try{
include_once("dbconnection.php"); 
  
$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$subject = mysqli_real_escape_string($conn, $_REQUEST['subject']);
$message = mysqli_real_escape_string($conn, $_REQUEST['message']);

// Attempt insert query execution
$sql = "INSERT INTO contactus (name,email,subject,message) VALUES ('$name','$email', '$subject', '$message')";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
} 
mysqli_close($conn);  
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
</body>
</html>
