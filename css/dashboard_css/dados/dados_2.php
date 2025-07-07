<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');
// CONEXÃO COM O BANCO DE DADOS
include '../conexao/conexao.php';

$sql = "SELECT tipo_de_falha, mes, SUM(quantidade) as total 
        FROM estatisticas 
        WHERE mes >= MONTH(CURDATE()) - 2 
        GROUP BY tipo_de_falha, mes 
        ORDER BY mes";

$res = mysqli_query($conn, $sql);

$dados = [];
$mesesNumeros = [];

// CONVERSÃO DOS NÚMEROS DOS MESES PARA NOMES
$nomesMeses = [1=>'JAN',2=>'FEV',3=>'MAR',4=>'ABR',5=>'MAI',6=>'JUN',7=>'JUL',8=>'AGO',9=>'SET',10=>'OUT',11=>'NOV',12=>'DEZ'];

while ($row = mysqli_fetch_assoc($res)) {
    $mesNum = (int)$row['mes'];
    $mesNome = $nomesMeses[$mesNum];

    // PRESERVAR NOME DO MÊS COMO CHAVE
    $mesesNumeros[$mesNum] = $mesNome;

    // PREENCHER DADOS COM O TIPO DE FALHA E O NOME DO MÊS
    $dados[$row['tipo_de_falha']][$mesNome] = (int)$row['total'];
}

// ORDENAR OS MESES POR NÚMERO
ksort($mesesNumeros);
$mesesNomes = array_values($mesesNumeros);


header('Content-Type: application/json');
echo json_encode(['dados' => $dados, 'meses' => $mesesNomes]);

// FECHANDO A CONEXÃO
mysqli_close($conn);
?>
