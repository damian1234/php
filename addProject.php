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
$projName = $_POST['NAME'];
$d = $_POST['DATE'];
$myUser = $_POST['USER'];
$date = date('Y-m-d', strtotime($d));
$sql = "INSERT INTO projects (project_name, end_date)
VALUES ('$projName', '$date' );";
if(mysqli_query($conn, $sql)){
  echo 1;
}

$query = "SELECT project_id FROM projects WHERE project_name='".$projName."'";
$result = mysqli_query($conn, $query);
if($result){
  $row = mysqli_fetch_assoc($result);
  $projId = $row['project_id'];  
  $query = "SELECT user_id FROM users WHERE username = '".$myUser."'";
  $result = mysqli_query($conn, $query);
  if($result){
    $row = mysqli_fetch_assoc($result);
    $userId = $row['user_id']; 
    $sql = "INSERT INTO user_projects (user_id, project_id)
    VALUES ('$userId', '$projId');";
    if(mysqli_query($conn, $sql)){
      echo 1;
    }
    else{
      echo 2;
    }
  }
  else{
    echo 3;
  }
}
else{
  echo 4;
}

mysqli_close($conn);
?>
