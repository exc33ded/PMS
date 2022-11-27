<?php
    require 'config.php';
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: Index-page1.php")
?>