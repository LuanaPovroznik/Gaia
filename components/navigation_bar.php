<?php
    include '../src/config.php';
    //include '../src/verification.php'; 
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: index.php' ) );
    }

    @$userLogin = $_SESSION['usuario'];
    @$userId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/navigation_bar_style.css">
    </head>
<body>
    <?php
        @$url_id = mysqli_real_escape_string($con, $_SESSION['usuario']);
        $sql = "SELECT usuario FROM cliente WHERE usuario = '{$url_id}'";
        $result = mysqli_query($con, $sql);

        $sql1 = "SELECT * FROM cliente WHERE usuario = '{$url_id}'";
        $result1 = mysqli_query($con, $sql1);
        $data1 = mysqli_fetch_array($result1);

        $sql2 = "SELECT usuario FROM funcionario WHERE usuario = '{$url_id}'";
        $result2 = mysqli_query($con, $sql2);

        $sql3 = "SELECT * FROM funcionario WHERE usuario = '{$url_id}'";
        $result3 = mysqli_query($con, $sql3);
        $data2 = mysqli_fetch_array($result3);

        if(mysqli_num_rows($result) > 0 && mysqli_num_rows($result2) == 0){
            echo '<div id="mySidenav" class="sidenav">';
            echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
            echo '<a href="novo_agendamento.php">Novo agendamento</a>';
            echo '<a href="meus_agendamentos.php">Meus agendamentos</a>';
            echo '<a href="meus_processos.php">Meus processos</a>';
            echo '</div>';
            echo '<div class="topnav">';
                echo '<span class="test" style="font-size:30px; color: snow; cursor:pointer; float: left; margin-left: 10px" onclick="openNav()">&#9776;</span>';
                echo '<div class="dropdown">';
                    echo '<button class="dropbtn">';
                    if($data1['avatar'] != null){
                        echo '<img class="userAvatar" src="../src/uploaded_img/'.$data1['avatar'].'" id="myImg"><br><br>';
                    } else {
                        echo '<img class="userAvatar" src="../img/no-image.png" id="myImg"><br><br>';
                    }
                    echo '</button>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="../src/profile.php">Meu perfil</a>';
                    echo '<a href="../src/logout.php">Sair</a>';
                    echo '</div>';
                echo '</div>';  
            echo '</div>';
        }

        $cargo = "advogado";
        if(mysqli_num_rows($result2) > 0 && mysqli_num_rows($result) == 0){
            if(strcmp($data2['cargo'], $cargo) === 0){
                echo '<div id="mySidenav" class="sidenav">';
                echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
                echo '<a href="novo_agendamento.php">Novo agendamento</a>';
                //echo '<a href="meus_processos.php">Meus processos</a>';
                echo '<a href="cadastro_processo.php">Cadastro de processos</a>';
                echo '<a href="cadastro_vara.php">Nova vara judiciária</a>';
                echo '</div>';
                echo '<div class="topnav">';
                    echo '<span class="test" style="font-size:30px; color: snow; cursor:pointer; float: left; margin-left: 10px" onclick="openNav()">&#9776;</span>';
                    echo '<div class="dropdown">';
                        echo '<button class="dropbtn">';
                        if($data2['avatar'] != null){
                            echo '<img class="userAvatar" src="../src/uploaded_img/'.$data2['avatar'].'" id="myImg"><br><br>';
                        } else {
                            echo '<img class="userAvatar" src="../img/no-image.png" id="myImg"><br><br>';
                        }
                        echo '</button>';
                        echo '<div class="dropdown-content">';
                        echo '<a href="../src/profile.php">Meu perfil</a>';
                        echo '<a href="../src/logout.php">Sair</a>';
                        echo '</div>';
                    echo '</div>';  
                echo '</div>';
            } else{
                echo '<div id="mySidenav" class="sidenav">';
                echo '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
                echo '<a href="#">Agendamentos</a>';
                echo '</div>';
                echo '<div class="topnav">';
                    echo '<span class="test" style="font-size:30px; color: snow; cursor:pointer; float: left; margin-left: 10px" onclick="openNav()">&#9776;</span>';
                    echo '<div class="dropdown">';
                        echo '<button class="dropbtn">';
                        if($data2['avatar'] != null){
                            echo '<img class="userAvatar" src="../src/uploaded_img/'.$data2['avatar'].'" id="myImg"><br><br>';
                        } else {
                            echo '<img class="userAvatar" src="../img/no-image.png" id="myImg"><br><br>';
                        }
                        echo '</button>';
                        echo '<div class="dropdown-content">';
                        echo '<a href="../src/profile.php">Meu perfil</a>';
                        echo '<a href="../src/logout.php">Sair</a>';
                        echo '</div>';
                    echo '</div>';  
                echo '</div>';
            }
        }
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
