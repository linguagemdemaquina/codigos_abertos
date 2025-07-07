<?php include 'conexao/conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Falhas</title>
  <link rel="stylesheet" href="css/folha_de_estilos_dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="dashboard">
    <img id="logomarca" class="logomarca" src="imagens/logomarca.png" alt="Logomarca">
    <h1>Dashboard de Estatísticas de Falhas</h1>
    <div class="graficos">
      <div class="grafico-card">
        <canvas id="grafico1"></canvas>
      </div>
      <div class="grafico-card">
        <canvas id="grafico2"></canvas>
      </div>
      <div class="grafico-card">
        <canvas id="grafico3"></canvas>
      </div>
      <div class="grafico-card">
        <canvas id="grafico4"></canvas>
      </div>
    </div>
  </div>
  
  <script src="js/grafico.js"></script>
  <script>
    console.log('Chamando as funções de carregar os gráficos');
    carregarGrafico({ url: 'dados/dados_1.php', canvasId: 'grafico1', tipo: 'doughnut', titulo: 'Percentual Total por Tipo de Falha' });
    carregarGrafico({ url: 'dados/dados_2.php', canvasId: 'grafico2', tipo: 'bar', titulo: 'Falhas por Tipo - 3 Meses' });
    carregarGrafico({ url: 'dados/dados_3.php', canvasId: 'grafico3', tipo: 'line', titulo: 'Tendência de Falhas - 6 Meses' });
    carregarGrafico({ url: 'dados/dados_4.php', canvasId: 'grafico4', tipo: 'pie', titulo: 'Status de Resolução' });
  </script>
</body>
</html>
