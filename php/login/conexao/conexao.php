<?php
// DADOS DE CONEXAO
$host = "... nome do host ..."; // Exemplo: "localhost" 
$usuario = "... nome do usuário ..."; // Exemplo: "root"
$senha = "... senha do usuário ..."; // Exemplo: "123456"
$banco = "... nome do banco de dados ..."; // Exemplo: "meu_banco"

// CRIA A CONEXAO
$conexao = new mysqli($host, $usuario, $senha, $banco);

// AJUSTA O CHARSET
$conexao -> set_charset("utf8");

// VERIFICA A CONEXAO
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}
else {
    // Ex.: echo "Conexão realizada com sucesso!";
}
?>