console.log('grafico.js foi carregado!');

function carregarGrafico({ url, canvasId, tipo, titulo }) {
  console.log('Chamando carregarGrafico para', canvasId, 'URL:', url, 'Tipo:', tipo);

  fetch(url)
    .then(response => {
      console.log('Resposta recebida de', url, response);
      return response.json();
    })
    .then(retorno => {
      console.log('JSON recebido de', url, retorno);

      const canvas = document.getElementById(canvasId);
      if (!canvas) {
        console.warn(`Canvas "${canvasId}" não encontrado.`);
        return;
      }

      const ctx = canvas.getContext('2d');
      console.log('Contexto obtido. Criando gráfico...');

      new Chart(ctx, {
        type: tipo,
        data: {
          labels: retorno.meses || Object.keys(retorno.dados),
          datasets: criaDatasets(retorno.dados, retorno.meses)
        },
        options: configPadrao(titulo, tipo)
      });

      console.log('Gráfico criado com sucesso para', canvasId);
    })
    .catch(erro => console.error(`Erro ao carregar ou processar dados de ${url}:`, erro));
}

function criaDatasets(dados, meses) {
  console.log('Criando datasets. Dados recebidos:', dados, 'Meses:', meses);

  const cores = [
    'rgba(126, 122, 122, 0.7)',
    'rgba(255, 99, 132, 0.7)',
    'rgba(54, 162, 235, 0.7)',
    'rgba(255, 206, 86, 0.7)',
    'rgba(153, 102, 255, 0.7)',
    'rgba(255, 159, 64, 0.7)'
  ];

  if (!meses) {
    const tipos = Object.keys(dados);
    const valores = Object.values(dados);
    return [{
      label: 'Percentual por Tipo',
      data: valores,
      backgroundColor: cores.slice(0, tipos.length)
    }];
  }

  let corIndex = 0;
  return Object.entries(dados).map(([tipo, valoresPorMes]) => {
    const alinhado = meses.map(mes => valoresPorMes[mes] || 0);
    const cor = cores[corIndex++ % cores.length];

    return {
      label: tipo,
      data: alinhado,
      backgroundColor: cor,
      borderColor: cor,
      tension: 0.4,
      borderWidth: 1,
      fill: false
    };
  });
}

function configPadrao(titulo, tipo) {
  const opcoes = {
    responsive: true,
    plugins: {
      title: { display: true, text: titulo },
      legend: { position: 'bottom' },
      tooltip: {
        callbacks: {
          label: ctx => {
            const val = ctx.parsed;
            return tipo === 'doughnut' || tipo === 'pie'
              ? `${ctx.label}: ${val.toFixed(1)}%`
              : `${ctx.label}: ${val}`;
          }
        }
      }
    }
  };

  if (tipo === 'bar' || tipo === 'line') {
    opcoes.scales = {
      y: { beginAtZero: true }
    };
  }

  if (tipo === 'doughnut') {
    opcoes.cutout = '70%';
    opcoes.rotation = -90;
    opcoes.circumference = 180;
  }

  return opcoes;
}

if (typeof carregarGrafico === 'function') {
  console.log('Função carregarGrafico está definida corretamente!');
} else {
  console.error('Função carregarGrafico NÃO está definida!');
}

console.log('grafico.js finalizado e pronto para uso!');
