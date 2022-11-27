<?php
  session_start();

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: SignIn-page2.php");
    exit;
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
    <!-- HEADER OF OUR WEBPAGE -->
    <div class="w3-bar w3-border w3-light-grey">
      <a href="/public_html/user_project_interface-page04.php" class="w3-bar-item w3-button w3-amber">PMS</a>
      <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">LogOut</a>
      <a href="/public_html/index_afterLogin(User).php" class="w3-bar-item w3-button w3-right">About</a>
  </div>

      <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <!-- CONTENT OF OUR WEBPAGE -->
    <div>
      <div class="w3-container w3-border w3-padding">
        <h1 class="w3-text-blue-gray w3-center">Project Management System</h1>
      </div>

      <div class="w3-margin w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-padding">
        <h3 class="w3-text-blue-gray w3-center">Mission And Purposes</h3>
        <div>
          <p class="w3-justify">
          Our objective is to design a system that can manage project work and task related to it. Here the Coordinator 
          who is the admin will add the Project and tasks related to it. With this the students who are the users can also 
          add tasks and view the work they have left and that is done. With this system, project management will never be the same.
          This application will grant the ability to substitute the traditional way of project management and provide unforgettable user experience. Also with the help if this application the user can increase their 
          efficiency in project management. It will also save tremendous amount of time and energy of the concerned user.
          </p>
        </div>
        <h3 class="w3-text-blue-gray w3-center">Why do you need it</h3>
        <div>
          <p class="w3-justify">
          The existing system of project management is manual. The Project Coordinator or Guide has to guide the 
          students manually on what task to perform and when they to be due are. As all this work is done manually so it 
          takes more time to get completed. Also remembering each step to take to complete the project is tiring many times 
          the user might forget what steps are there. This product will provide the users with a framework for managing 
          and organizing resources in such a way that these resources deliver all the work required to complete a 
          software project within defined scope, time and cost constraints. This product will be more efficient than the
           traditional way of project managing, i.e. done by pen and paper.
          </p>
        </div>
        <h3 class="w3-text-blue-gray w3-center">Meet The Team</h3>
        <div>
          <p class="w3-justify">
          We are just small computer enthuasists and students who have a love for Computer Science and it's application.
                <i>Want to know more about us click the links on the footer.</i>
          </p>
        </div>
      </div>

    </div>

    <!-- FOOTER OF OUT WEBPAGE -->

    <div class="w3-bar w3-border w3-light-grey w3-padding" style="margin-top: 8vh;">
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
  </body>
</html>
