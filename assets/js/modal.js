document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('flightModal');
    const closeButton = document.querySelector('.close-button');
    const passagens = document.querySelectorAll('.pass');

    const openModal = (data) => {
        document.getElementById('modal-destino').textContent = data.destino;
        document.getElementById('modal-origem').textContent = `Saindo de ${data.origem}`;
        document.getElementById('modal-checkin').textContent = data.checkin;
        document.getElementById('modal-checkout').textContent = data.checkout;
        document.getElementById('modal-duracao').textContent = data.duracao;
        
        // Atualiza o link do botão de comprar
        const buyButton = document.getElementById('modal-buy-button');
        buyButton.href = data.urlCompra;
        
        modal.style.display = 'flex';
    };

    const closeModal = () => {
        modal.style.display = 'none';
    };

    passagens.forEach(passagem => {
        passagem.addEventListener('click', () => {
            // Coleta os dados do elemento clicado usando o 'dataset'
            const flightData = {
                origem: passagem.dataset.origem,
                destino: passagem.dataset.destino,
                checkin: passagem.dataset.checkin,
                checkout: passagem.dataset.checkout,
                duracao: passagem.dataset.duracao,
                urlCompra: passagem.dataset.urlCompra
            };
            openModal(flightData);
        });
    });

    closeButton.addEventListener('click', closeModal);

    // Evento para fechar o modal se clicar fora dele
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});