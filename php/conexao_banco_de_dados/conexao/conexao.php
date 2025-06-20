<?php
// DADOS DE CONEXAO
$host = "... nome do host ..."; // Exemplo: "localhost" 
$usuario = "... nome do usuário ..."; // Exemplo: "root"
$senha = "... senha do usuário ..."; // Exemplo: "123456"
$banco = "... nome do banco de dados ..."; // Exemplo: "meu_banco"

// CRIA A CONEXAO
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// VERIFICA A CONEXAO
if (!$conexao) {
      die("Conenxão falhou : " . mysqli_connect_error());
}
else {
      echo "Conexão realizada com sucesso!";
}
// AJUSTA O CHARSET
$conexao -> set_charset("utf8");
?>