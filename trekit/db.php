<?php
error_reporting(0);
$servername = "mysql.hostinger.in";
$username = "u942926382_trek";
$password = "trekIT123$";
$dbname = "u942926382_trek";
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding";
*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    throw new Exception("Connection failed: " . $conn->connect_error);
} 

?>