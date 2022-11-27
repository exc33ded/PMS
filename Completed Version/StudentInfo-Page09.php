<?php
$_SESSION["loggedin"] = true;

  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: adminLogin-page07.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project User Interface Page-4</title>
    <link rel="stylesheet" href="w3.css">
</head>

<body>

    <!-- HEADER OF OUR WEBPAGE -->

    <div class="w3-bar w3-border w3-light-grey">
        <a href="/public_html/admin_projInterface-page08.php"
            class="w3-bar-item w3-button w3-amber">PMS</a>
        <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">LogOut</a>
        <a href="/public_html/index_afterLogin(Admin).php"
            class="w3-bar-item w3-button w3-right">About</a>
    </div>


    <div class="w3-row">
        <div class=" w3-col w3-conatiner w3-light-grey" style="width:20%;">
            <p>
                <a href="/public_html/admin_projInterface-page08.php"
                    class="w3-bar-item w3-button">Project</a>
                <br>
                <a href="/public_html/StudentInfo-Page09.php" class="w3-bar-item w3-button">Student
                    Info</a>
                <br>
                <a href="#" class="w3-bar-item w3-button w3-disabled">About Me</a>
            </p>
        </div>

        <div class="w3-rest w3-container" style="background-color: azure;">
            <p>

            <div>
                <table class="w3-table w3-bordered">
                    <thead>

                        <tr>
                            <th>Student Name</th>
                            <th>Roll No.</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <!-- Here we link database to table of students -->
                    <tbody>
                        <?php
                        include "config.php";
                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                            header("location: adminLogin-page07.php");
                            exit;
                        }

                        $selectquery = "SELECT `name`, `rollno`, `username` FROM student";

                        $query = mysqli_query($conn, $selectquery);

                        $nums = mysqli_num_rows($query);


                        while($res = mysqli_fetch_array($query))
                        {

                        ?> 
                            <tr>
                                <td><?php echo $res['name'] ?></td>
                                <td><?php echo $res['rollno'] ?></td>
                                <td><?php echo $res['username'] ?></td>
                            </tr>
                            <!-- Validatng the '}' braces -->
                        <?php

                        }

                        ?>
                    </tbody>
                </table>
            </div>
            </p>
        </div>
    </div>
    <!-- FOOTER OF OUT WEBPAGE -->

    <div class="w3-bar w3-light-grey w3-padding" style="margin-top: 59vh;">
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