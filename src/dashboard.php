<!doctype html>
    <?php
        include 'config.php';
        include '../components/navigation_bar.php';

        @$userLogin = $_SESSION['login'];
        @$userId = $_SESSION['id'];
    ?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/register_style.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
   <h1>Bem vindo ao Dashboard</h1>
</body>
</html>