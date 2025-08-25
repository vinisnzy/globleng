document.addEventListener("DOMContentLoaded", () => {
  const botaoVerMais = document.querySelector(".btn-ver-mais");
  const ocultos = document.querySelectorAll(".oculto");
  const section = document.getElementById("list");

  let visiveis = false;

  botaoVerMais.addEventListener("click", () => {
    if (!visiveis) {
      ocultos.forEach((item) => { 
        let display = item.classList.contains("pass") ? "flex" : "block";
        item.style.display = display;
        setTimeout(() => item.classList.add("visivel"), 10);
      });
      botaoVerMais.textContent = "Ver menos...";
      visiveis = true;
    } else {
      let sizeScroll = section.classList.contains("passes") ? 300 : 50;
      const offsetTop = section.offsetTop - sizeScroll;

      window.scrollTo({
        top: offsetTop,
      });

      setTimeout(() => {
        ocultos.forEach((item) => {
          item.classList.remove("visivel");
          setTimeout(() => (item.style.display = "none"), 150);
        });
        botaoVerMais.textContent = "Ver mais...";
        visiveis = false;
      }, 100);
    }
  });
});