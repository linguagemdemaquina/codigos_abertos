<?php
// CONEXÃO COM O BANCO DE DADOS
include '../conexao/conexao.php';

$sql = "SELECT tipo_de_falha, SUM(quantidade) as total FROM estatisticas GROUP BY tipo_de_falha";
$res = mysqli_query($conn, $sql);

$dados = [];
$totalGeral = 0;

while ($row = mysqli_fetch_assoc($res)) {
  $totalGeral += $row['total'];
  $dados[$row['tipo_de_falha']] = $row['total'];
}

// CÁLCULO PERCENTUAL GERAL DE REGISTROS EXISTENTES
foreach ($dados as $tipo => $valor) {
  $dados[$tipo] = ($valor / $totalGeral) * 100;
}

header('Content-Type: application/json');
echo json_encode(['dados' => $dados]);

// FECHANDO A CONEXÃO
mysqli_close($conn);
?>
