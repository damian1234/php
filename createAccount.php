<?php
$servername = "localhost";
$username = "root";
$password = "swenggroup";
$db_name = "sweng";
$user = "appUser";
$userpass = "sweng";

// Create connection
$conn = new mysqli($servername, $user, $userpass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$first = $_POST['FIRST'];
$last = $_POST['LAST'];
$name = $_POST['NAME']; 
$pass = $_POST['PASSWORD'];
$sql = "INSERT INTO users (first_name, last_name, username, password)
VALUES ('$first', '$last', '$name' , '$pass');";

if(mysqli_query($conn, $sql)){
  echo 1;
}
mysqli_close($conn);
?>
