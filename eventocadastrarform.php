<?php
    session_start();
    
    //include "../acessocomum.php";
?>
<html>
<head>
<title>Confirmar Agendamento</title>
<meta charset="UTF-8">
<!--<link rel="stylesheet" href="./css/form.css">-->
</head>
<body>
<?php
//Lê a data e hora clicadas pelo usuário.
$date = new \DateTime($_GET['date'],new \DateTimeZone('America/Sao_Paulo'));
$profissional = $_GET['id_profissional'];

?>
<form name="formAdd" id="formAdd" method="post" action="eventocadastrarcodigo.php">
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>" readonly><br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>" readonly><br>
    Usuário: <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['id']; ?>" readonly><br>
    Profissional: <input type="text" name="profissional" id="profissional" value="<?php echo $profissional; ?>" readonly><br>
    Serviço: <input type="text" name="servico" id="servico" value="<?php echo $profissional; ?>"><br>
    <input type="submit" value="Confirmar">
</form>
</body>
</html>
