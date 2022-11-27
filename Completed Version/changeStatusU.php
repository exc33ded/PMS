<?php

$_SESSION["loggedin"] = true;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: SignIn-page2.php");
    exit;
  }
  if (!(isset($_GET['proj_name']))) {
    header('Location: user_project_interface-page04.php');
    exit();
}

    require_once "config.php";

    // $connection = new mysqli($host, $db_user, $db_password, $db_name);

    if($conn->connect_errno!=0){
        echo "Error: ".$conn->connect_errno . "<br>";
        echo "Description: " . $conn->connect_error;
        exit();
    }
    $proj_name = $_GET['proj_name'];
    $taskNum = $_GET['task_name'];
    $newStatus = $_GET['status'];

    $sql = "UPDATE task SET state = '$newStatus' WHERE proj_name = '$proj_name' AND task_num = '$taskNum'";

     if($result = $conn->query($sql)){
        header("Location: task_Interface(user)-page-05.php?proj_name=$proj_name");
    }
    else{
        echo '<span class="error-msg">sql error</span>';
    } 
?>

