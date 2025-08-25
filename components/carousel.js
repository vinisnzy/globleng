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