<?php
    session_start();
    include 'config.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/cadastre_se_style.css">
    <?php
    
        @$url_id = mysqli_real_escape_string($con, $_SESSION['usuario']);
        $sql2 = "SELECT * FROM funcionario WHERE usuario = '{$url_id}'";
        $result2 = mysqli_query($con, $sql2);

        if(mysqli_num_rows($result2) > 0){
                while ($row = mysqli_fetch_array($result2)){
                    @$userRole = $row['cargo'];
                }
            }

    ?>
    <title>Cadastre-se</title>
</head>

<body>
<div class="container">
    <div class="center">
        <div class="right">
            <form action="cadastre_se.php" method="post">
                <?php 
                    if (!isset($_SESSION['usuario']) || !isset($_SESSION['id'])) {
                        echo '<h2 style="font-family: \'Asap Condensed Medium\'; font-weight: normal">Cadastre-se</h2>';
                    } else {
                        echo '<h2 style="font-family: \'Asap Condensed Medium\'; font-weight: normal">Cadastrar novo usuário</h2>';
                    }
                ?>
                <select name="cargoUsuario" id="cargoUsuario" style="margin-right: 230px" onchange="mostrarCampos()">
                    <option value="Cliente">Cliente</option>
                    <?php 
                        if(@$userRole == "Advogada"){
                            echo '<option value="Secretária">Secretária</option>';
                            echo '<option value="Advogada">Advogada</option>';
                        }
                    ?>
                </select><br><br>
                <input type="text" placeholder="Nome completo" name="nomeUsuario" required>
                <br><br>
                <input type="password" placeholder="Senha" name="senhaUsuario" required>
                <br> <br>
                <input type="text" placeholder="CPF" name="cpfUsuario" required>
                <br><br>
                <input type="text" placeholder="Nome de usuário" name="nomeDeUsuario" required>
                <br><br>
                <input type="text" placeholder="Número OAB" name="oabAdvogado" id="oabAdvogado" style="display: none">
                <br><br>
                <input type="submit" value="Cadastre-se" class="loginButton" name="registerButton" id="registerButton">
                <?php 
                    if (!isset($_SESSION['usuario']) || !isset($_SESSION['id'])) {
                        echo '<a href="index.php"><p class="registerLink">Já possui uma conta? Faça login</p></a>';
                    } else {
                        echo '<a href="dashboard.php"><p class="registerLink">&#8592 Voltar para dashboard</p></a>';
                    }
                ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<script>
    function mostrarCampos(){
        const value = document.getElementById("cargoUsuario").value;
        if (value == "Advogada"){
            document.getElementById("oabAdvogado").style.display = "";
        } else {
            document.getElementById("oabAdvogado").style.display = "none";
        }
    }
</script>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p class="confirmationRegister">Cadastrado com sucesso.</p>
        <a href="index.php"><input type="button" class="backLogin" value="Ir para login &#8594;"></a>
    </div>
</div>

<div id="novoUsuarioConfirmacao" class="modal">
    <div class="modal-content">
        <p class="confirmationRegister">Novo usuário cadastrado com sucesso.</p>
        <a href="dashboard.php"><input type="button" class="backLogin" value="Ir para tela inicial &#8594;"></a>
    </div>
</div>

<div id="errorModal" class="modal">
    <div class="modal-content">
        <p class="confirmationRegister">Erro ao tentar realizar cadastro.</p>
        <a href="cadastre_se.php"><input type="button" class="backLogin" value="&#8592; Tentar novamente"></a>
    </div>
</div>

<script>
    function confirmationModal(){
        const modal = document.getElementById("confirmationModal");
        modal.style.display = "block";
    }

    function errorModal(){
        const modal = document.getElementById("errorModal");
        modal.style.display = "block";
    }

    function novoUsuario(){
        const modal = document.getElementById("novoUsuarioConfirmacao");
        modal.style.display = "block";
    }
</script>
<?php
    if(@$_REQUEST['registerButton'] == "Cadastre-se") {
        @$cpfUsuario = $_POST["cpfUsuario"];
        @$nomeUsuario = $_POST["nomeUsuario"];
        @$nomeDeUsuario = $_POST["nomeDeUsuario"];
        @$senhaUsuario = md5($_POST["senhaUsuario"]);
        @$oabAdvogado = $_POST["oabAdvogado"];
        @$cargoUsuario = $_POST["cargoUsuario"];
        @$avatarCliente = null;

        if (@$cargoUsuario == "Cliente"){
            $sql = "INSERT INTO cliente (cpf, nome, usuario, senha, avatar)
                        VALUES ('$cpfUsuario', '$nomeUsuario', '$nomeDeUsuario', '$senhaUsuario', '$avatarCliente')";
            if (mysqli_query($con, $sql)) {
                echo '<script>confirmationModal()</script>';
            } else {
                echo '<script>errorModal()</script>';
            }
        } else if (@$cargoUsuario == "Secretária"){
            $sql = "INSERT INTO funcionario (nome, cargo, usuario, senha, avatar)
                        VALUES ('$nomeUsuario', '$cargoUsuario', '$nomeDeUsuario', '$senhaUsuario', '$avatarCliente')";
            if (mysqli_query($con, $sql)) {
                echo '<script>novoUsuario()</script>';
            } else {
                echo mysqli_error($con);
                echo '<script>errorModal()</script>';
            }
        } else {
            $sql = "INSERT INTO funcionario (nome, cargo, usuario, senha, avatar)
                        VALUES ('$nomeUsuario', '$cargoUsuario', '$nomeDeUsuario', '$senhaUsuario', '$avatarCliente')";
            $result = mysqli_query($con, $sql);

            $getId = "SELECT id FROM funcionario WHERE usuario = '$nomeDeUsuario'";
            $result2 = mysqli_query($con, $getId);

            while($row = mysqli_fetch_array($result2)){
                @$userId = $row['id'];
            }

            $sql2 = "INSERT INTO advogado (nome, oab, funcionario)
                        VALUES ('$nomeUsuario', '$oabAdvogado', '$userId')";
            if (mysqli_query($con, $sql2)) {
                echo '<script>novoUsuario()</script>';
            } else {
                echo '<script>errorModal()</script>';
            }
        }
    }
?>
