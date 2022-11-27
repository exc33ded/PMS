<?php

    include 'config.php';
    if(isset($_POST['delete'])){
        $proj_name2 = $_GET['proj_name'];

        $query = "DELETE FROM `project` WHERE `proj_name` = '$proj_name2'";
        $query_run = mysqli_query($conn, $query);
        var_dump($query_run);

        if($query_run){
            echo
            '<script> alert("Project Deleted Successfully!!"); </script>';
            header('location: admin_projInterface-page08.php');
        }
        else{
            echo
            "<script> alert('Project Could Not Be Deleted!!'); </script>";
        }
    }

?>