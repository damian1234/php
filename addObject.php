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

$code = $_POST['BARCODE'];
$condition = $_POST['DAMAGED'];
$sql = "SELECT item_name FROM items where barcode= '$code' LIMIT 1;";
$result = mysqli_query($conn, $sql);
if($result){
  $row = mysqli_fetch_assoc($result);
  if($row >0){
    $name = $row['item_name'];
    $sql = "INSERT INTO items(item_name, barcode, damaged)
    VALUES ('$name', '$code', '$condition');";
    if(mysqli_query($conn, $sql)){
      echo 1;
    }
  }
  else{
    $name = $_POST['NAME'];
    $sql = "INSERT INTO items(item_name, barcode, damaged)
    VALUES ('$name', '$code', '$condition');";
    if(mysqli_query($conn, $sql)){
      echo 1;
    }
  }
}

mysqli_close($conn); 
?>
