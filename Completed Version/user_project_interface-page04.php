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
        <a href="/public_html/user_project_interface-page04.php"
            class="w3-bar-item w3-button w3-amber">PMS</a>
        <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">LogOut</a>
        <a href="/public_html/index_afterLogin(User).php" class="w3-bar-item w3-button w3-right">About</a>
    </div>


    <div class="w3-row">
        <div class=" w3-col w3-conatiner w3-light-grey" style="width:20%;">
            <p>
                <a href="/public_html/user_project_interface-page04.php"
                    class="w3-bar-item w3-button">Project</a>
                <br>
                <a href="#" class="w3-bar-item w3-button w3-disabled">About Me</a>
            </p>
        </div>

        <div class="w3-rest w3-container" style="background-color: azure;">
            <p>
            <div>
                <b class="w3-text-blue w3-padding-top">Welcome To PMS</b>
                <!-- <button class="w3-right w3-border-0 w3-amber w3-button" type="submit">Create Project</button> -->
                <a href="/public_html/CreateProjectUser-page11.php"
                    class="w3-button w3-amber w3-hover-blue-gray w3-right">Create Project</a>
            </div>
            <div>
                <table class="w3-table w3-bordered">
                    <tr>
                        <th>Project Name</th>
                        <th>Tasks Left</th>
                        <th>Tasks Done</th>
                        <th>Operations</th>
                    </tr>
                    <!-- Here we link database to table of students -->
                    <tbody>
                            <?php
                        include "config.php";
                        $_SESSION["loggedin"] = true;

                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                            header("location: SignIn-page2.php");
                            exit;
                        }

                        $selectquery = "SELECT * FROM project WHERE username = '{$_SESSION['username']}'";

                        $query = mysqli_query($conn, $selectquery);

                        while ($res = mysqli_fetch_array($query)) {
                            $proj_name = $res['proj_name'];

                            $q2 = "SELECT * FROM  `task` where proj_name = '$proj_name' AND state != 4";
                        $res_q2 = mysqli_query($conn, $q2);
                        $row_count = mysqli_num_rows($res_q2);

                        $q4 = "SELECT * FROM  `task` where proj_name = '$proj_name' AND state = 4";
                        $res_q4 = mysqli_query($conn, $q4);
                        $row_count1 = mysqli_num_rows($res_q4);

                            echo"
                            <tr>
                                <td>
                                    ".$res['proj_name']."
                                </td>
                                <td>".$row_count."</td>
                                <td>".$row_count1."</td>
                                <td>
                                <a href='/public_html/task_Interface(user)-page-05.php?proj_name=".$res['proj_name']."' class='w3-green w3-button w3-padding-small'>Open</a>
                                </td>
                            </tr>";
        
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