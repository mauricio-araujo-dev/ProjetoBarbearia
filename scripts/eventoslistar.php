<?php
//Faz a conexão com o BD.
require '../conexao.php';
$id_profissional = $_GET['id_profissional'];

$sql1 = "SELECT * FROM profissional where id=". $id_profissional;

$eventos=array();

$sql = "SELECT agendamentos.*, servicos.nome as servico_nome FROM agendamentos INNER JOIN servicos on servicos.id = agendamentos.servico WHERE id_profissional=". $id_profissional;


//Executa o SQL
$result = $conn->query($sql);

//Existem formas mais simples tipo fetchAll,
//mas depende de versão do PHP
while($row = $result->fetch_assoc()) {
    $title = $row["servico_nome"];
    $description = "Esta é a descricao do seu corte";
    $start = strtotime($row['Horario']);
    $end = strtotime($row['Horario']) + 2400;
    $start = date('Y-m-d H:i:s', $start);
    $end = date('Y-m-d H:i:s', $end);
    $color = "#c18845";
    
    $linha = array(
       'title' => $title,
       'description' => $description,
       'start' => $start,
       'end' => $end,
       'color' => $color,
    );
    array_push($linha, "Titulo=",$title);
    array_push($linha, $description);
    array_push($linha, $start);
    array_push($linha, $end);
    array_push($linha, $color);
    
    array_push($eventos, $linha);
}

//Transforma o array em um padrão json
$eventosjson = json_encode($eventos);

//O javascript recebe os dados
//Só pode haver um echo
 
echo $eventosjson;
?>