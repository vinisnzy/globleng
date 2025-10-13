document.addEventListener("DOMContentLoaded", () => {
    const params = new URLSearchParams(window.location.search);
    const status = params.get("status");
    const message = params.get("message");
  
    if (status && message) {
      iziToast[status]({
        title: status === "success" ? "Sucesso" : "Erro",
        message: message,
        position: "topRight"
      });

    params.delete("status");
    params.delete("message");
  
    const newSearch = params.toString();
    const newUrl = `${window.location.pathname}${newSearch ? `?${newSearch}` : ''}`;
    
    // Atualiza a URL na barra de endereço sem recarregar
    window.history.replaceState({}, '', newUrl);
    }
});