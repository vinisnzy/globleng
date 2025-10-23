document.addEventListener("DOMContentLoaded", () => {
  const btnLeft = document.querySelector(".carousel-btn.left");
  const btnRight = document.querySelector(".carousel-btn.right");
  const track = document.querySelector(".carousel-track");
  // Seleciona os links <a> em vez das imagens <img> para calcular o espaço total
  const slides = document.querySelectorAll(".carousel-track a");

  if (slides.length === 0) return; // Para o script se não houver slides

  let index = 0;
  let visibleImages = 3; // Valor padrão (será recalculado)
  let totalImages = slides.length;
  let slideWidth = 0; // Valor padrão (será recalculado)

  function updateCarousel() {
    // Calcula o deslocamento
    const offset = index * slideWidth;
    track.style.transform = `translateX(-${offset}px)`;
  }

  function setupCarousel() {
    // Pega o primeiro slide para medir
    const firstSlide = slides[0];
    if (!firstSlide) return;

    // 1. MEDIR O SLIDE ATUAL
    // Pega o estilo computado (incluindo CSS)
    const slideStyle = window.getComputedStyle(firstSlide);
    const slideMarginRight = parseFloat(slideStyle.marginRight);
    
    // clientWidth é a largura real renderizada do elemento
    slideWidth = firstSlide.clientWidth + slideMarginRight;

    // 2. CALCULAR SLIDES VISÍVEIS
    const containerWidth = track.clientWidth;
    
    // Compara a largura do slide com a do container
    if (firstSlide.clientWidth >= containerWidth) {
      // Caso mobile (1 slide ocupa 100%)
      visibleImages = 1;
    } else {
      // Caso desktop/tablet (múltiplos slides)
      // Usamos Math.round para "arredondar" para o número mais próximo de slides
      // que o seu CSS está tentando mostrar.
      visibleImages = Math.round(containerWidth / slideWidth);
    }
    
    // 3. ATUALIZAR E RESETAR
    // Garante que o 'index' não fique "fora" após redimensionar
    if (index > totalImages - visibleImages) {
      index = totalImages - visibleImages; // Vai para o último slide possível
      if (index < 0) index = 0; // Garante que não seja negativo
    }
    
    updateCarousel();
  }

  // --- EVENT LISTENERS ---

  btnRight.addEventListener("click", () => {
    index++;
    // Usa as variáveis dinâmicas
    if (index > totalImages - visibleImages) {
      index = 0; // Volta para o começo
    }
    updateCarousel();
  });

  btnLeft.addEventListener("click", () => {
    index--;
    // Usa as variáveis dinâmicas
    if (index < 0) {
      index = totalImages - visibleImages; // Vai para o fim
      if (index < 0) index = 0; // Garante que não seja negativo (caso totalImages < visibleImages)
    }
    updateCarousel();
  });

  // --- INICIALIZAÇÃO ---

  // Roda a configuração inicial
  setupCarousel();

  // Roda a configuração novamente toda vez que a janela mudar de tamanho
  window.addEventListener("resize", setupCarousel);
});