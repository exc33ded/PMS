<?php
    $_SESSION["loggedin"] = true;
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("location: SignIn-page2.php");
        exit;
    }
    if (!(isset($_GET['proj_name']))) {
        header('Location: SignIn-page2.php');
        exit();
    }

    require_once "config.php";

    $conn = new mysqli("localhost", "root", "", "pms_alpha");

    if($conn->connect_errno!=0){
        echo "Error: ".$conn->connect_errno . "<br>";
        echo "Description: " . $conn->connect_error;
        exit();
    }
    $proj_name = $_GET['proj_name'];
    $task_num = $_GET['task_num'];
?>


<?php
    $sql = "SELECT * FROM `task` WHERE `proj_name` = '$proj_name' AND `task_num` = $task_num";
     if($result = $conn->query($sql)){
        $rowsCount = $result->num_rows;
        if($rowsCount>0){
            $row = $result->fetch_assoc();
            $result->free_result();
        }
        else{
            echo '<span class="error-msg">sql error</span>';
            exit();
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="w3.css">
  </head>
  <body>

<div class="w3-bar w3-border w3-light-grey">
      <a href="/public_html/user_project_interface-page04.php" class="w3-bar-item w3-button w3-amber">PMS</a>
      <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">LogOut</a>
      <a href="/public_html/index_afterLogin(User).php" class="w3-bar-item w3-button w3-right">About</a>
    </div>

<br>

    <a class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-right" href="task_Interface(user)-page-05.php?proj_name=<?php echo $proj_name ?>">Back</a><br><br>
<div class="container task-view w3-center">
    <div class="w3-margin w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-padding">
        <h1 class='w3-text-blue-grey'><?php echo $proj_name . '-' . $task_num ?></h1>
        <div class="lg-12 single-task">
            <h2 class='w3-text-blue'>Task name:<?php echo ' '. $row['task_name']; ?></h2>
            <p class='w3-text-blue'>Task Description:<?php echo ' '. $row['task_desc']; ?></p>
        </div> 
    </div>

        
</div>

<div class="w3-bar w3-border w3-light-grey w3-padding" style="margin-top: 44vh;">
      <div class="w3-left">Mohammed Sarim
          <a href="https://github.com/exc33ded" target="_blank"><img src="github.png" alt="Github" height="40px"></a>
          <a href="https://www.linkedin.com/in/mohammed-sarim-a4a310210/" target="_blank"><img src="linkdin.png"
                  alt="Linkedin" height="40px"></a>
      </div>


      <div class="w3-right">
          <a href="http://linkedin.com/in/khushnood-bilal-b3500a250" target="_blank"><img src="linkdin.png"
                  alt="Linkedin" height="40px"></a>
          <a href="https://github.com/raging-bilal" target="_blank"><img src="github.png" alt="Github"
                  height="40px"></a>
          Khushnood Bilal
      </div>
  </div>
        
</div>
</body>
</html>


