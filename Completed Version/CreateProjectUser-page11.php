<?php

$_SESSION["loggedin"] = true;

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: SignIn-page2.php");
    exit;
  }

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    include 'config.php';

    $res = "SELECT `rollno` FROM student WHERE username = '{$_SESSION['username']}'";
    
    $res1 = mysqli_query($conn, $res);
    $row_res = mysqli_fetch_array($res1);

    $proj_name = $_POST["proj_name"];
    $proj_desc = $_POST["proj_desc"];

    $query = "INSERT INTO `project` (`proj_id`, `proj_name`, `username`, `rollno`, `proj_desc`) VALUES ('', '$proj_name', '{$_SESSION['username']}', '{$row_res["rollno"]}', '$proj_desc')";
    $test = mysqli_query($conn, $query);
    // var_dump($query);
    if ($test){
      echo
      "<script> alert('Project Added!!');</script>";
    }
    else{
      echo
      "<script> alert('Project with the Same Name EXIST!! Try Again');</script>";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin create Project Page-12</title>
  <link rel="stylesheet" href="w3.css">
  <style>
    .textarea {
      width: 100%;
      resize: none;
    }
  </style>
</head>

<body>



  <!-- HEADER OF OUR WEBPAGE -->

  <div class="w3-bar w3-border w3-light-grey">
    <a href="/public_html/user_project_interface-page04.php" class="w3-bar-item w3-button w3-amber">PMS</a>
    <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">LogOut</a>
    <a href="/public_html/index_afterLogin(User).php" class="w3-bar-item w3-button w3-right">About</a>
  </div>


  <!-- 
    CONTENT OF OUR WEBPAGE -->
    <div class="w3-container w3-border w3-margin w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-padding">

      <form action="" method="post">
        <div>
          <strong>
        <label for="proj_name" class="w3-text-blue">
          Project name:
        </label>
      </strong>
      <input type="text" placeholder="Project Name" name="proj_name" class="w3-input w3-hover-border-amber">
    </div>

    <div>
      <strong>
          <label for="proj" class="w3-text-blue">Project Desription: </label>
      </strong>
      <br><textarea name="proj_desc" cols="30" rows="10" class="textarea"></textarea>
    </div>
    <br>
    
    
    
    <span>
      <div>
          <input type="submit" value="CREATE" class="w3-button w3-amber w3-hover-blue-gray w3-left">
      </div>
      <div>
        <a href="/public_html/user_project_interface-page04.php" class="w3-button w3-amber w3-hover-blue-gray w3-right">GO BACK</a>
        <!-- <input type="submit" value="GO BACK" class="w3-button w3-amber w3-hover-blue-gray w3-right"> -->
      </span>
    </div>
  </form>
</div>




  <!-- FOOTER OF OUT WEBPAGE -->


  <div class="w3-bar w3-border w3-light-grey w3-padding" style="margin-top: 18vh;">
    <div class="w3-left">Mohammed Sarim
      <a href="https://github.com/exc33ded" target="_blank"><img src="github.png" alt="Github" height="40px"></a>
      <a href="https://www.linkedin.com/in/mohammed-sarim-a4a310210/" target="_blank"><img src="linkdin.png"
          alt="Linkedin" height="40px"></a>
    </div>


    <div class="w3-right">
      <a href="http://linkedin.com/in/khushnood-bilal-b3500a250" target="_blank"><img src="linkdin.png" alt="Linkedin"
          height="40px"></a>
      <a href="https://github.com/raging-bilal" target="_blank"><img src="github.png" alt="Github" height="40px"></a>
      Khushnood Bilal
    </div>
  </div>


</body>

</html>