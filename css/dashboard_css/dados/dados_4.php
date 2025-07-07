<?php
// CONEXÃO COM O BANCO DE DADOS
include '../conexao/conexao.php';

$sql = "SELECT resolucao, SUM(quantidade) as total FROM estatisticas GROUP BY resolucao";
$res = mysqli_query($conn, $sql);

$dados = [];
$totalGeral = 0;

while ($row = mysqli_fetch_assoc($res)) {
  $totalGeral += $row['total'];
  $dados[$row['resolucao']] = $row['total'];
}

// CÁLCULO PERCENTUAL GERAL DOS STATUS DE RESOLUÇÃO NOS REGISTROS EXISTENTES
foreach ($dados as $status => $valor) {
  $dados[$status] = ($valor / $totalGeral) * 100;
}

header('Content-Type: application/json');
echo json_encode(['dados' => $dados]);

// FECHANDO A CONEXÃO
mysqli_close($conn);
?>
