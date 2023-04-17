<?php
session_start();
//Só administrador pode acessar o programa.
//require 'acessoadm.php';

// Dados do Formulário
$camponome  = filter_input(INPUT_POST, 'nome');
$campousername  = filter_input(INPUT_POST, 'username');
$campoemail = filter_input(INPUT_POST, 'email');
$campocpf  = filter_input(INPUT_POST, 'cpf');
$campotelefone  = filter_input(INPUT_POST, 'telefone');
$campoendereco  = filter_input(INPUT_POST, 'endereco');
$campoacesso = filter_input(INPUT_POST, 'acesso');
//$senha = filter_input(INPUT_POST, 'senha');

//O EasyPHP não tem password_hash, por isso deixei as duas opções
$camposenha = password_hash(filter_input(INPUT_POST, 'senha'), PASSWORD_BCRYPT);
//$camposenha = filter_input(INPUT_POST, 'senha');       

//Verifica campos vazios. 
//Se o filtro encontrar caracter proibido, a variável estará em branco.
//if(!$camponome || !$campousername || !$campoemail || !$campoacesso || !$camposenha  || !$campotelefone  || !$campocpf  //|| !$campoendereco){
//	header("Location: usuariocadastrartela.php?erro=1");
//	exit;
//}

//Faz a conexão com o BD.
require 'conexao.php';

//Verifica email duplicado e retorna erro.
$sql = "select * from usuarios where Email='$campoemail'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$_SESSION["id_usuario"] = $row["Id"];



if ($result->num_rows > 0) {
	header("Location: usuariocadastrartela.php?erro=2");
	exit;	
}
    
//Cria um número inteiro aleatório dentro do intervalo
$validador = rand(10000000,99999999);

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuarios(username, email, nome, telefone, cpf, endereco, senha, acesso, status, validador) VALUES('$campousername', '$campoemail', '$camponome', '$campotelefone', '$campocpf', '$campoendereco', '$camposenha', 'Cliente', 'aguardando', '$validador')";

//Executa o SQL
if ($conn->query($sql) === TRUE) {
  header( "refresh:;url=usuarioscontrolar.php" );	
  echo "Gravado com sucesso.";

  //Envie email para validar a conta.
require 'enviaremail.php';  

//Conteúdo do email de validação
$texto = "Clique <a href='the-prime-barber.000webhostapp.com/usuariovalidaremail.php?id=" . $campoemail . "&validador=" . $validador . "'>aqui</a>.";

enviaremail($camponome, $campoemail, 'Validar conta', $texto);

} else {
 // header( "refresh:3;url=index.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>