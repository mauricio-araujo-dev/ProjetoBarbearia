<?php
session_start();
$logado='';
if(isset($_SESSION['acesso'])){
    $logado = $_SESSION['username'];
}
?>

        <link rel="stylesheet" href="css/menu.css">
        <link rel="apple-touch-icon" sizes="57x57" href="imagens/logos/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="imagens/logos/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="imagens/logos/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="imagens/logos/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="imagens/logos/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="imagens/logos/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="imagens/logos/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="imagens/logos/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="imagens/logos/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="imagens/logos/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="imagens/logos/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="imagens/logos/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="imagens/logos/favicon-16x16.png">
<link rel="manifest" href="imagens/logos/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="imagens/logos/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


    <?php
include 'menu.php';
?>
