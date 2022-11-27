<?php
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    include 'config.php';
    $name = $_POST["name"];
    $username = $_POST["username"];
    $rollno = $_POST["rollno"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM student WHERE username = '$username' OR rollno = '$rollno'");

    if(mysqli_num_rows($duplicate) > 0){
      echo
        "<script> alert('Username or Roll no Has Already Taken');</script>";
    }
    else{
      if($password == $cpassword){
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `student` (`stud_id`, `name`, `rollno`, `username`, `password`) VALUES ('', '$name', '$rollno', '$username', '$password')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Registration was Succesful!!');</script>";
      }
      else{
        echo
        "<script> alert('Password Does Not Match!');</script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp page-3</title>
  <link rel="stylesheet" href="w3.css">
</head>

<body>
  <!-- HEADER OF OUR WEBPAGE -->

  <div class="w3-bar w3-border w3-light-grey">
    <a href="/public_html/Index-page1.php" class="w3-bar-item w3-button w3-amber">PMS</a>
    <a href="/public_html/SignUp-page3.php" class="w3-bar-item w3-button w3-right">SignUp</a>
    <a href="/public_html/Index-page1.php" class="w3-bar-item w3-button w3-right">About</a>
  </div>

  <!-- CONTENT OF OUR WEBPAGE -->
    <div class="w3-padding w3-margin">
      <h3 class="w3-center w3-text-dark-gray">Registration</h3>

      <div class="w3-margin-right w3-margin-left">
        <div class="w3-container w3-margin w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-padding-24 w3-margin">

          <form action="" class="w3-animate-zoom" method="post">

            <div class="w3-text-blue-grey">
              Name: <input type="text" name="name" placeholder=" Enter your Name" class="w3-input w3-border-amber w3-hover-border-amber" />
            </div>
            <div class="w3-text-blue-grey">
              Username: <input type="text" placeholder=" Enter your Username" name="username" class="w3-input w3-border-amber w3-hover-border-amber"/>
            </div>
            <div class="w3-text-blue-grey">
              Roll no: <input type="text" placeholder=" Enter your Rollno" name="rollno" class="w3-input w3-border-amber w3-hover-border-amber" /></div>
            <div class="w3-text-blue-grey">
              Password: <input type="password" placeholder=" Enter your Password" name="password" class="w3-input w3-border-amber w3-hover-border-amber"/>
            </div>
            <div class="w3-text-blue-grey">
              Confirm Password:
              <input type="password" placeholder=" Confirm your Password" name="cpassword" class="w3-input w3-border-amber w3-hover-border-amber"/>
            </div>
            <br>
            <input type="submit" value="SUBMIT" class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-left" name="submit">
            <!-- <input type="submit" value="GO BACK" onclick="open()" class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-right"> -->
            <a href="/public_html/SignIn-page2.php" class="w3-button w3-amber w3-ripple w3-round-xxlarge w3-right">GO BACK</a>
          </form>
        </div>
      </div>
    </div>


    <!-- FOOTER OF OUT WEBPAGE -->

    <div class="w3-bar w3-border w3-light-grey w3-padding">
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