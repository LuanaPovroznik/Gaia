<?php include 'config.php'; ?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/cadastre_se_style.css">
    <title>Cadastre-se</title>
</head>
<body>
<div class="container">
    <div class="center">
        <div class="right">
            <form action="cadastre_se.php" method="post">
                <h2 style="font-family: 'Asap Condensed Medium'; font-weight: normal">Cadastre-se</h2>
                <input type="text" placeholder="Nome completo" name="nomeCliente">
                <br><br>
                <input type="password" placeholder="Senha" name="senhaCliente">
                <br> <br>
                <input type="text" placeholder="CPF" name="cpfCliente">
                <br><br>
                <input type="text" placeholder="Nome de usuário" name="nomeUsuarioCliente">
                <br><br>
                <input type="submit" value="Cadastre-se" class="loginButton" name="registerButton" id="registerButton">
                <a href="index2.php"><p class="registerLink">Já possui uma conta? Faça login</p></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p class="confirmationRegister">Cadastrado com sucesso.</p>
        <a href="index2.php"><input type="button" class="backLogin" value="Ir para login &#8594;"></a>
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
</script>
<?php
    if(@$_REQUEST['registerButton'] == "Cadastre-se") {
        @$cpfCliente = $_POST["cpfCliente"];
        @$nomeCliente = $_POST["nomeCliente"];
        @$nomeUsuarioCliente = $_POST["nomeUsuarioCliente"];
        @$senhaCliente = md5($_POST["senhaCliente"]);
        @$avatarCliente = null;


        $sql = "INSERT INTO cliente (cpf, nome, usuario, senha, avatar)
                        VALUES ('$cpfCliente', '$nomeCliente', '$nomeUsuarioCliente', '$senhaCliente', '$avatarCliente')";


        if (mysqli_query($con, $sql)) {
            echo '<script>confirmationModal()</script>';
        } else {
            echo '<script>errorModal()</script>';
        }
    }
?>
