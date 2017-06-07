<?php
$servername = "localhost";
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

$name = $_POST['NAME'];
$pass = $_POST['PASSWORD'];
$query = "SELECT username FROM users WHERE username='".$name."' AND password='".$pass."'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if ($row['username'] == $name) {
    echo 1;
}
else {
    echo 0;
}
mysqli_close($conn); 
?>
