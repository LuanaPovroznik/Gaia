<?php
    include 'verification.php';
    include 'config.php';
    include '../components/navigation_bar.php';

    @$userLogin = $_SESSION['usuario'];
    @$userId = $_SESSION['id'];
    @$userNome = $_SESSION['nome'];
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/dashboard_style.css" rel="stylesheet">
    <title>Dashboard</title>
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
        echo "<h1 style=\"font-size: 26px; margin-left: 10px;\">Bem vindo, ". $data1['nome']."</h1>";
        echo '<div class="row">';
        echo '<div class="column">';
            echo '<div class="card" style="text-align: left;">';
                echo '<h2 style="text-align: left;">Meus processos</h2>';
                $getMeusProcessos = "SELECT * FROM processo WHERE cliente = '$userId'";
                    $resultMeusProcessos = mysqli_query($con, $getMeusProcessos);
                    while ($row = mysqli_fetch_array($resultMeusProcessos)){
                        echo '<h4>Último processo ativo</h4>';
                        echo '<p><span style="font-weight: bold;">Número do processo:</span> '.$row['numero'].'</p>';
                        echo '<p><span style="font-weight: bold;">Assunto:</span> '.$row['assunto'].'</p>';
                        echo '<p><span style="font-weight: bold;">Última movimentação:</span> '.$row['movimentacao'].'</p>';
                    }
            echo '</div>';
            echo '</div>';
            //echo '<div class="column">';
              //  echo '<div class="card">';
                //    echo '<p>grafico</p>';
                //echo '</div>';
            //echo '</div>';
            echo '<div class="column">';
                echo '<div class="card" style="text-align: left;">';
                    echo '<h2>Meus agendamentos</h2>';
                        $getMinhasReunioes = "SELECT * FROM reuniao WHERE cliente = '$userId'";
                        $resultMinhasReunioes = mysqli_query($con, $getMinhasReunioes);
                        while ($row = mysqli_fetch_array($resultMinhasReunioes)){
                            echo '<h4>Próxima reunião</h4>';
                            echo '<p><span style="font-weight: bold;">Data:</span> '.$row['data'].'</p>';
                        }
                echo '</div>';
            echo '</div>';
        echo '</div>';

    }
    
    $cargo = "advogado";

    if(mysqli_num_rows($result2) > 0 && mysqli_num_rows($result) == 0){
        if(strcmp($data2['cargo'], $cargo) === 0){
            echo "<h1 style=\"font-size: 26px; margin-left: 10px;\">Bem vindo, ". $data2['nome']."</h1>";

            echo '<div class="row">';
            echo '<div class="column">';
                echo '<div class="card" style="text-align: left;">';
                    echo '<h2 style="text-align: left;">Meus processos</h2>';
                    $getMeusProcessos = "SELECT * FROM processo WHERE advogado = '$userId'";
                    $resultMeusProcessos = mysqli_query($con, $getMeusProcessos);
                    while ($row = mysqli_fetch_array($resultMeusProcessos)){
                        echo '<h4>Último processo cadastrado</h4>';
                        echo '<p><span style="font-weight: bold;">Número do processo:</span> '.$row['numero'].'</p>';
                        echo '<p><span style="font-weight: bold;">Assunto:</span> '.$row['assunto'].'</p>';
                        echo '<p><span style="font-weight: bold;">Última movimentação:</span> '.$row['movimentacao'].'</p>';
                    }
                echo '</div>';
                echo '</div>';
                //echo '<div class="column">';
                  //  echo '<div class="card">';
                    //    echo '<p>grafico</p>';
                    //echo '</div>';
                //echo '</div>';
                echo '<div class="column">';
                    echo '<div class="card" style="text-align: left;">';
                        echo '<h2 style="text-align: left;">Meus agendamentos</h2>';
                        $getMinhasReunioes = "SELECT * FROM reuniao WHERE advogado = '$userId'";
                        $resultMinhasReunioes = mysqli_query($con, $getMinhasReunioes);
                        while ($row = mysqli_fetch_array($resultMinhasReunioes)){
                            echo '<h4>Próxima reunião</h4>';
                            echo '<p><span style="font-weight: bold;">Data:</span> '.$row['data'].'</p>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        } else{
            echo "<script>console.log('No dasboard: ".$data2['cargo']."');</script>";
            echo "<h1 style=\"font-size: 26px\">Bem vindo ao Dashboard ". $data2['nome']."</h1>";
    
            echo '<div class="row">';
            echo '<div class="column">';
                echo '<div class="card">';
                    echo '<p>funcionario padrão</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="column">';
                    echo '<div class="card">';
                        echo '<p>grafico</p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="column">';
                echo '<div class="column">';
                    echo '<div class="card">';
                        echo '<p>agendamentos</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
?>
</body>
</html>