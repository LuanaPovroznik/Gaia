<?php
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: index.php' ) );
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/navigation_bar.style.css">
    </head>
<body>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Perfil</a>
    <a href="#">Meus agendamentos</a>
    <a href="#">Meus processos</a>
    <a href="#">Meus agendamentos</a>
    </div>
    <div class="topnav">
        <span style="font-size:30px; color: snow; cursor:pointer" onclick="openNav()">&#9776; GAIA</span>
    </div>
<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    }
</script>
</body>
</html> 
