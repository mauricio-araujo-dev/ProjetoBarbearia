<?php
// Parâmetros para criar a conexão
$servername = "localhost";
$username = "id19728784_theprimebarber";
$password = "#Kj!]HZPT-ntlz2k";
$dbname = "id19728784_primebarber";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
  die("Você se deu mal: " . $conn->connect_error);

}
?>