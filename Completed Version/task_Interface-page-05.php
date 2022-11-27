<?php
$_SESSION["loggedin"] = true;

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: adminLogin-page07.php");
    exit;
}
if (!(isset($_GET['proj_name']))) {
    header('Location: admin_projInterface-page08.php');
    exit();
}

include "config.php";

// $connection = new mysqli($host, $db_user, $db_password, $db_name);
$conn = new mysqli("localhost", "root", "", "pms_alpha");


if ($conn->connect_errno != 0) {
    echo "Error: " . $conn->connect_errno . "<br>";
    echo "Description: " . $conn->connect_error;
    exit();
}
$proj_name = $_GET['proj_name'];

?>


<?php

$sql = "SELECT * FROM `project` WHERE `proj_name` = '$proj_name'";

if ($result = $conn->query($sql)) {
    $rowsCount = mysqli_num_rows($result);
    // $rowsCount = $result->num_rows;
    if ($rowsCount > 0) {
        $row = mysqli_fetch_assoc($result);
        // $row = $result->fetch_assoc();
        // $result->free_result();
        mysqli_free_result($result);
    } else {
        echo '<script>alert("SQL ERROR!!")</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="w3.css">
    <title>Task Interface</title>
    <style>
        .list {
            min-height: 1000px;
            background-color: #dbdbdb;
            padding: 7px;
            border-radius: 5px;
        }

        a.task {
            display: block;
            color: #5e6c84;
            text-decoration: none;
            background-color: #f0eff0;
            border-radius: 5px;
            padding: 15px;
            font-weight: 500;
            margin-bottom: 7px;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="w3-bar w3-border w3-light-grey">
        <a href="/public_html/admin_projInterface-page08.php" class="w3-bar-item w3-button w3-amber">PMS</a>
        <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">LogOut</a>
        <a href="/public_html/index_afterLogin(Admin).php" class="w3-bar-item w3-button w3-right">About</a>
    </div>

    <div class="w3-margin">
        <h2>
            <?php echo $row['proj_name']; ?>
        </h2>
        <b>
            <?php echo $row['proj_desc']; ?>
        </b>
    </div>

    <div class="w3-padding">
        <?php
        echo "
        <a href='/public_html/ACreateTask.php?proj_name=" . $row['proj_name'] . "'
            class='w3-button w3-amber w3-ripple w3-round-xxlarge w3-right'>Create Task</a>
        <a href='/public_html/admin_projInterface-page08.php'
            class='w3-button w3-amber w3-ripple w3-round-xxlarge w3-right'>Go Back</a>";

        ?>
    </div>

    <div class="w3-row">
        <div class="w3-quarter">
            <h3 class="w3-center">BackLogged</h3>
        </div>

        <div class="w3-quarter">
            <h3 class="w3-center">Stagnant</h3>
        </div>

        <div class="w3-quarter">
            <h3 class="w3-center">In-Progress</h3>
        </div>

        <div class="w3-quarter">
            <h3 class="w3-center">Completed</h3>
        </div>
    </div>

    <div class="w3-row-padding w3-border">
        <div class="w3-quarter list w3-padding">
            <div class="a.task">

                <?php

                $sql1 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '1'";
                $sql2 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '2'";
                $sql3 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '3'";
                $sql4 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '4'";

                if ($result = mysqli_query($conn, $sql1)) {
                    $projectsCount = mysqli_num_rows($result);
                    if ($projectsCount > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $task_num = $row['task_num'];
                            echo "
                <div class='task-box'>
                    <a href='task.php?proj_name=$proj_name&task_num=$task_num' class='task'
                        <h4>" . ($row['task_name']) . "</h4>
                        <h4>" . ($row['date']) . "</h4>
                        <div>
                            <span class='task-id'>" . "TASK" . "-" . $row['task_num'] . "</span>
                        </div>
                    </a>
                
                    <select class='changeStatus' onchange='location = this.value'>
                        <option class='no-display' selected='selected'>Status</option>
                        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=1'>Backlogged</option>
                        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=2'>Stagnent</option>
                        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=3'>In-Progress</option>
                        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=4'>Completed</option>
                    </select>
                </div>
                ";
                        }
                        $result->free_result();
                    }
                }

                ?>
            </div>
        </div>


        <div class="w3-quarter w3-container w3-blue-gray w3-justify list w3-padding">
            <div class="a.task">
                <?php

                $sql1 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '1'";
                $sql2 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '2'";
                $sql3 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '3'";
                $sql4 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '4'";

                if ($result = mysqli_query($conn, $sql2)) {
                    $projectsCount = mysqli_num_rows($result);
                    if ($projectsCount > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $task_num = $row['task_num'];
                            echo "
<div class='task-box'>
    <a href='task.php?proj_name=$proj_name&task_num=$task_num' class='task'
        <h4>" . ($row['task_name']) . "</h4>
        <h4>" . ($row['date']) . "</h4>
        <div>
            <span class='task-id'>" . "TASK" . "-" . $row['task_num'] . "</span>
        </div>
    </a>
    <select class='changeStatus' onchange='location = this.value'>
        <option class='no-display' selected='selected'>Status</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=1'>Backlogged</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=2'>Stagnent</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=3'>In-Progress</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=4'>Completed</option>
    </select>
</div>
";
                        }
                        $result->free_result();
                    }
                }

                ?>
            </div>
        </div>
        <div class="w3-quarter w3-container w3-blue w3-justify list w3-padding">
            <div class="a.task">
                <?php

                $sql1 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '1'";
                $sql2 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '2'";
                $sql3 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '3'";
                $sql4 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '4'";

                if ($result = mysqli_query($conn, $sql3)) {
                    $projectsCount = mysqli_num_rows($result);
                    if ($projectsCount > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $task_num = $row['task_num'];
                            echo "
<div class='task-box'>
    <a href='task.php?proj_name=$proj_name&task_num=$task_num' class='task'
        <h4>" . ($row['task_name']) . "</h4>
        <h4>" . ($row['date']) . "</h4>
        <div>
            <span class='task-id'>" . "TASK" . "-" . $row['task_num'] . "</span>
        </div>
    </a>
    <select class='changeStatus' onchange='location = this.value'>
        <option class='no-display' selected='selected'>Status</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=1'>Backlogged</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=2'>Stagnent</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=3'>In-Progress</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=4'>Completed</option>
    </select>
</div>
";
                        }
                        $result->free_result();
                    }
                }

                ?>
            </div>
        </div>
        <div class="w3-quarter w3-container w3-green w3-justify list w3-padding">
            <div class="a.task">
                <?php

                $sql1 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '1'";
                $sql2 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '2'";
                $sql3 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '3'";
                $sql4 = "SELECT * FROM task WHERE proj_name = '$proj_name' AND state = '4'";

                if ($result = mysqli_query($conn, $sql4)) {
                    $projectsCount = mysqli_num_rows($result);
                    if ($projectsCount > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $task_num = $row['task_num'];
                            echo "
<div class='task-box'>
    <a href='task.php?proj_name=$proj_name&task_num=$task_num' class='task'
        <h4>" . ($row['task_name']) . "</h4>
        <h4>" . ($row['date']) . "</h4>
        <div>
            <span class='task-id'>" . "TASK" . "-" . $row['task_num'] . "</span>
        </div>
    </a>
    <select class='changeStatus' onchange='location = this.value'>
        <option class='no-display' selected='selected'>Status</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=1'>Backlogged</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=2'>Stagnent</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=3'>In-Progress</option>
        <option value='changeStatus.php?proj_name=$proj_name&task_name=$task_num&status=4'>Completed</option>
    </select>
</div>
";
                        }
                        $result->free_result();
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <div class="w3-bar w3-light-grey w3-padding" style="margin-top: 50vh;">
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