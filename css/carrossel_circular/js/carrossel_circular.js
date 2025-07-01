window.addEventListener('DOMContentLoaded', () => {
  const imagens = document.querySelectorAll('.carrossel-imagem');
  const pontos = document.querySelectorAll('.ponto');
  let indiceAtivo = 0;

  function atualizarCarrossel() {
    imagens.forEach((img, index) => {
      img.classList.remove('ativa', 'anterior', 'posterior');
      if(index === indiceAtivo){
        img.classList.add('ativa');
      } else if(index === (indiceAtivo - 1 + imagens.length) % imagens.length){
        img.classList.add('anterior');
      } else if(index === (indiceAtivo + 1) % imagens.length){
        img.classList.add('posterior');
      }
    });
    pontos.forEach((ponto, index) => {
      ponto.classList.toggle('ativa', index === indiceAtivo);
    });
  }

  document.querySelector('.posterior').addEventListener('click', () => {
    indiceAtivo = (indiceAtivo + 1) % imagens.length;
    atualizarCarrossel();
  });

  document.querySelector('.anterior').addEventListener('click', () => {
    indiceAtivo = (indiceAtivo - 1 + imagens.length) % imagens.length;
    atualizarCarrossel();
  });

  pontos.forEach(ponto => {
    ponto.addEventListener('click', () => {
      indiceAtivo = parseInt(ponto.getAttribute('data-index'));
      atualizarCarrossel();
    });
  });

  atualizarCarrossel();
});