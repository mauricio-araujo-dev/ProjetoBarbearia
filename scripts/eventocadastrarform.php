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
require '../conexao.php';
//Lê a data e hora clicadas pelo usuário.
$date = new \DateTime($_GET['date'],new \DateTimeZone('America/Sao_Paulo'));
$profissional = $_GET['id_profissional'];
$opcoes = '';
$sqlServicos = "SELECT id, nome FROM servicos";
$resultServicos = $conn->query($sqlServicos);
while ($rowServicos = $resultServicos->fetch_assoc()) {
    $opcoes .= '<option value="'.$rowServicos["id"].'">'.$rowServicos["nome"].'</option>';
}

$sqlProfissional = "SELECT nome FROM profissionais WHERE id = $profissional";
$resultProfissional = $conn->query($sqlProfissional);
$profissionalNome = $resultProfissional->fetch_assoc();
?>
<form name="formAdd" id="formAdd" method="post" action="eventocadastrarcodigo.php">
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>" readonly><br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>" readonly><br>
    Usuário: <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['id']; ?>" readonly><br>
    Profissional: <?=$profissionalNome["nome"]?> <input type="hidden" name="profissional" id="profissional" value="<?php echo $profissional; ?>" readonly><br>
    Serviço: <select type="text" name="servico" id="servico">
                <?=$opcoes?>
            </select>
        
        
    <br><input type="submit" value="Confirmar">
</form>
</body>
</html>
