<?php
$_SESSION["loggedin"] = true;

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: adminLogin-page07.php");
    exit;
}
if (!(isset($_GET['proj_name']))) {
    header('Location: task_Interface-page-05.php');
    exit();
}

$proj_name1 = $_GET['proj_name'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'config.php';
    //  Getting proj_name 
    // posting inserted values
    $task_name = $_POST["task_name"];
    $date = $_POST["date"];
    $task_desc = $_POST["task_desc"];

    $sqlCount = "SELECT * FROM `task` WHERE `proj_name` = '$proj_name1'";
    $result = mysqli_query($conn, $sqlCount);
    $taskCount = $result->num_rows+1;

    // var_dump($taskCount);

    // $res = "SELECT * FROM `project` WHERE `proj_name` = $proj_name1";
    // $res1 = mysqli_query($conn, $res);
    // $row_res = mysqli_fetch_array($res1);

    $query = "INSERT INTO `task` (`task_id`, `task_name`, `task_num`, `date`, `task_desc`, `state`, `proj_name`) VALUES ('', '$task_name', '$taskCount','$date', '$task_desc', '2', '$proj_name1')";

    // var_dump($query);
    // $query = "INSERT INTO `task` (`task_id`, `task_name`, `task_desc`, `state`, `proj_name`) VALUES ('', $task_name, '$date', '$task_desc', '2', '$proj_name1', '{$_SESSION["username"]}')";

    // var_dump($query);

    $test = mysqli_query($conn, $query);
    // var_dump($test);

    if ($test) {
        echo
            "<script> alert('Task added');</script>";
    } else {
        echo
            "<script> alert('Task adding failed');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a href="/public_html/admin_projInterface-page08.php"
            class="w3-bar-item w3-button w3-amber">PMS</a>
        <a href="/public_html/logout.php" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="/public_html/index_afterLogin(Admin).php"
            class="w3-bar-item w3-button w3-right">About</a>
    </div>

    <!-- CONTENT OF OUR WEBPAGE -->

    <div class="w3-container w3-border w3-margin w3-topbar w3-bottombar w3-rightbar w3-leftbar w3-padding">
        <form action="" method="post">
            <div>
                <strong>
                    <label for="task_name" class="w3-text-blue">Task name: </label>
                </strong>
                <input type="text" placeholder="enter task name" class="w3-input w3-hover-border-amber"
                    name="task_name">
            </div>

            <div>
                <strong>
                    <label for="date" class="w3-text-blue">Due Date:</label>
                </strong>
                <input type="date" name="date" class="w3-input w3-hover-border-amber">
            </div>
            <br>

            <div>
                <strong>
                    <label for="task" class="w3-text-blue">Task Desription: </label>
                </strong>
                <br><textarea name="task_desc" cols="30" rows="10" class="textarea" type="text"></textarea>
            </div>

            <br>

            <!-- CONTENT OF OUR WEBPAGE -->


            <span>
                <div>
                    <input type="submit" value="CREATE" class="w3-button w3-amber w3-hover-blue-gray w3-left">
                </div>
                <div>
                    <a href="/public_html/task_Interface-page-05.php"
                        class="w3-button w3-amber w3-hover-blue-gray w3-right">GO BACK</a>
                    <!-- <input type="submit" value="GO BACK" class="w3-button w3-amber w3-hover-blue-gray w3-right"> -->
            </span>
    </div>
    </div>
    </form>
    <br><br><br>

    <!-- FOOTER OF OUT WEBPAGE -->

    <div class="w3-bar w3-border w3-light-grey w3-padding">
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
            Khusnood Bilal
        </div>
    </div>

</body>

</html>