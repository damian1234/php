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
$username = $_POST['NAME'];
$obj = $_POST['OBJECT'];
$d = $_POST['RETURN'];
$date = date("Y-m-d", strtotime($d));
$query = "SELECT item_id FROM items WHERE item_name = '".$obj."'";
$result = mysqli_query($conn, $query);
if($result){
  $row = mysqli_fetch_assoc($result);
  $objId = $row['item_id'];
  $query = "SELECT user_id FROM users WHERE username = '".$username."'";
  $result = mysqli_query($conn, $query);
    if($result){
      $row = mysqli_fetch_assoc($result);
      $userId = $row['user_id'];
      $sql = "INSERT INTO user_items (user_id, item_id)
      VALUES('$userId', '$objId')";
      $result = mysqli_query($conn, $query);
      if($result){
        $sql = "UPDATE items SET return_date ='".$date."' WHERE item_name = '".$obj."'";
        $result = mysqli_query($conn,$query);
        if($result){
          echo 1;
        }
      }
    }
}
mysqli_close($conn);
?>
