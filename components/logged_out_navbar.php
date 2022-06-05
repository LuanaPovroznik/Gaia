<?php
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: ./src/index.php' ) );
    }
?>
<link rel="stylesheet" href="../css/nav_bar_style.css">
<ol>
    <div style="margin-right: 30px; margin-top: 20px; align-content: center; justify-content: center">
        <li class="title" style="margin-top: 10px"><span>GAIA</span></li>
        <li style="float: right; margin-bottom: 20px"><a href="#">Cadastre-se</a></li>
        <li style="float: right; margin-bottom: 20px"><a href="#">Entrar</a></li>
        <li style="float: right; margin-bottom: 20px"><a href="index.php">Inicial</a></li>
    </div>
</ol>
