<?php
// if($_SERVER['REQUEST_METHOD']=="POST")
// {
//   include 'config.php';
//   $username = $_POST["username"];
//   $password = $_POST["password"];
//   $result = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username'");
//   $row = mysqli_fetch_assoc($result);
//   if(mysqli_num_rows($result) > 0){
//     if($password == $row["password"]){
//       $_SESSION["login"] = true;
//       $_SESSION["id"] = $row["id"];
//       header("Location: index_afterLogin(User).php");
//     }
//     else{
//       echo
//       "<script> alert('Wrong Password!!');</script>";
//     }
//   }
//   else{
//     echo
//       "<script> alert('User Not Registered!!');</script>";
//   }
// }
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include "config.php";
  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1){
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: index_afterLogin(User).php");
  }
  else{
    echo
      "<script> alert('Invalid Credentials!!');</script>";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignIn Page 2</title>
  <link rel="stylesheet" href="w3.css">
</head>
<style>
  .sarim {
    margin-top: 21vh;
  }
</style>

<body>

  <!-- HEADER OF OUR WEBPAGE -->
  <div class="w3-bar w3-border w3-light-grey">
    <a href="/public_html/Index-page1.php" class="w3-bar-item w3-button w3-amber">PMS</a>
    <a href="/public_html/SignIn-page2.php" class="w3-bar-item w3-button w3-right">SignIn</a>
    <a href="/public_html/Index-page1.php" class="w3-bar-item w3-button w3-right">About</a>
  </div>


  <!-- CONTENT OF OUR WEBPAGE -->
  <div class="w3-padding w3-margin">
    <h1 class="w3-center w3-text-dark-gray"> Project Management System</h1>
  </div>
  <div class="w3-margin-right w3-margin-left">
    <div class="w3-container w3-margin w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-padding-24">

      <form action="" class="w3-animate-zoom" method="post">
        <div>
          <label for="username" class="w3-text-blue-grey">
            USERNAME:
          </label>
          <input type="text" placeholder="Enter Username" name="username" required="required"
            class="w3-input w3-border-amber w3-hover-border-amber">
        </div>

        <div>
          <label for="password" class="w3-text-blue-grey">
            PASSWORD:
          </label>
          <input type="password" placeholder= "Enter Password" name="password" class="w3-input w3-border-amber w3-hover-border-amber">
        </div>

        <br>

        <button type="submit" class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-left" name="submit">LOGIN</button>
        <!-- <input type="submit" value="ADMIN" class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-right"> -->
        <a href="/public_html/adminLogin-page07.php"
          class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-right">ADMIN</a>
        <br>
        <br>
        <div class="w3-left"><a href="/public_html/SignUp-page3.php"
            class="w3-text-blue w3-hover-text-blue-gray">Create new
            account?</a></div>
      </form>

    </div>
  </div>
  <!-- FOOTER OF OUT WEBPAGE -->
  <footer class="w3-bar w3-border w3-light-grey w3-padding w3-container sarim">

    <div>
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
  </footer>
</body>

</html>