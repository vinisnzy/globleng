// CARDS
document.addEventListener("DOMContentLoaded", () => {
  const botaoVerMais = document.querySelector(".btn-ver-mais");
  const cardsOcultos = document.querySelectorAll(".card-oculto");
  const cardsSection = document.getElementById("cards-globleng");

  let visiveis = false;

  botaoVerMais.addEventListener("click", () => {
    if (!visiveis) {
      cardsOcultos.forEach((card) => {
        card.style.display = "block";
        setTimeout(() => card.classList.add("card-visivel"), 10);
      });
      botaoVerMais.textContent = "Ver menos...";
      visiveis = true;
    } else {
      const offsetTop = cardsSection.offsetTop - 50;

      window.scrollTo({
        top: offsetTop,
      });

      setTimeout(() => {
        cardsOcultos.forEach((card) => {
          card.classList.remove("card-visivel");
          setTimeout(() => (card.style.display = "none"), 300);
        });
        botaoVerMais.textContent = "Ver mais...";
        visiveis = false;
      }, 200);
    }
  });
});

//CAIXA DE PESQUISA
const dateInput = document.getElementById("date-input");

dateInput.addEventListener("input", function (e) {
  let value = e.target.value.replace(/\D/g, "").slice(0, 16);
  let formatted = "";

  if (value.length > 0) formatted += value.slice(0, 2);
  if (value.length > 2) formatted += "/" + value.slice(2, 4);
  if (value.length > 4) formatted += "/" + value.slice(4, 8);
  if (value.length > 8) formatted += " - " + value.slice(8, 10);
  if (value.length > 10) formatted += "/" + value.slice(10, 12);
  if (value.length > 12) formatted += "/" + value.slice(12, 16);

  e.target.value = formatted;
});

// CARROSSEL
document.addEventListener("DOMContentLoaded", () => {
  const btnLeft = document.querySelector(".carousel-btn.left");
  const btnRight = document.querySelector(".carousel-btn.right");
  const track = document.querySelector(".carousel-track");
  const images = document.querySelectorAll(".carousel-track img");

  let index = 0;
  const visibleImages = 3;
  const totalImages = images.length;
  const imageWidth = 360 + 20;

  function updateCarousel() {
    const offset = index * imageWidth;
    track.style.transform = `translateX(-${offset}px)`;
  }

  btnRight.addEventListener("click", () => {
    index++;
    if (index > totalImages - visibleImages) {
      index = 0;
    }
    updateCarousel();
  });

  btnLeft.addEventListener("click", () => {
    index--;
    if (index < 0) {
      index = totalImages - visibleImages;
    }
    updateCarousel();
  });
});
