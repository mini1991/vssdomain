<html>
<body>
<?php  
$servername = "localhost";
$username = "root";
$password = "abc123";
$dbname = "mydb";
 
$conn = mysqli_connect($servername, $username, $password, $dbname);  
if(! $conn )  
{  
  die('Could not connect: ' . mysqli_connect_error());  
}
?>  
</body>
</html>