<?php
    session_start();
    if(!isset($_SESSION["id"]) && !isset($_SESSION["usuario"])) {
    	echo "<script>console.log('No if: ".$_SESSION['id']."');</script>";
    	echo "<script>console.log('No if: ".$_SESSION['usuario']."');</script>";
        echo "<script>top.location.href='index.php';</script>";
    } else {
    	echo "<script>console.log('No else: ".$_SESSION['id']."');</script>";
    	echo "<script>console.log('No else: ".$_SESSION['usuario']."');</script>";
    }
?> 