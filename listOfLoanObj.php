<?php
$servername = "localhost";
$db_name = "sweng";
$user = "appUser";
$userpass = "sweng";

// Create connection
$conn = new mysqli($servername, $user, $userpass, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "select item_name, item_id from items;"
$result = mysqli_query($conn, $query);
if($result){
  while($row = $result->fetch_array()){
    echo $row['item_name'];
    echo ',';
    echo $row['item_id'];
  }
}
else{
  echo 0;
}

mysqli_close($conn);
?>
