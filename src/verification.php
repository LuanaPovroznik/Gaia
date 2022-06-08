<?php
    session_start();
    if(!isset($_SESSION["id"]) || !isset($_SESSION["usuario"])) {
        echo "<script>console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');</script>";
//        echo "<script>top.location.href='login.php';</script>";
    }
?> 