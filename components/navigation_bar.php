<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/navigation_bar_style.css">
    </head>
<body>
    <?php
            echo '<div id="mySidenav" class="sidenav">';
            echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
            echo '<a href="#">Meus agendamentos</a>';
            echo '<a href="#">Meus processos</a>';
            echo '<a href="#">Meus agendamentos</a>';
            echo '<a href="cadastro_vara.php">Nova vara judiciária</a>';
            echo '</div>';
            echo '<div class="topnav">';
                echo '<span class="test" style="font-size:30px; color: snow; cursor:pointer; float: left; margin-left: 10px" onclick="openNav()">&#9776;</span>';
                echo '<div class="dropdown">';
                    echo '<button class="dropbtn">';
                        echo '<img class="userAvatar" src="../img/no-image.png" id="myImg">';
                    echo '</button>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="#">Meu perfil</a>';
                    echo '<a href="logout.php">Sair</a>';
                    echo '</div>';
                echo '</div>';  
            echo '</div>';



           /* echo '<div id="mySidenav" class="sidenav">';
            echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
            echo '<a href="#">Nova vara judiciária</a>';
            echo '</div>';
            echo '<div class="topnav">';
                echo '<span class="test" style="font-size:30px; color: snow; cursor:pointer;" onclick="openNav()">&#9776; GAIA</span>';
                echo '<div class="dropdown">';
                    echo '<button class="dropbtn">';
                        echo '<img class="userAvatar" src="../img/no-image.png" id="myImg">';
                    echo '</button>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="#">Meu perfil</a>';
                    echo '<a href="logout.php">Sair</a>';
                    echo '</div>';
                echo '</div>';  
            echo '</div>';*/
        

    ?>
  
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
