<?php
//Verifica se o usuário logou.
if(!isset ($_SESSION['username']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['username']);
  unset($_SESSION['acesso']);
  header('location:index.php');
  exit;
}
?>