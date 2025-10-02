document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('modal-detalhes');
    const closeButton = modal.querySelector('.close-button');
    const passagens = document.querySelectorAll('.pass');
    
    // Seleciona os elementos que serão atualizados
    const modalImage = modal.querySelector('.modal-image');
    const modalTitulo = modal.querySelector('#modal-destino-titulo');
    const modalDescricao = modal.querySelector('#modal-descricao');
    const modalPreco = modal.querySelector('#modal-preco');
    const modalRota = modal.querySelector('#modal-rota'); // <--- NOVO ELEMENTO SELECIONADO

    passagens.forEach(button => {
        button.addEventListener('click', () => {
            // Pega todos os dados do botão clicado
            const destino = button.getAttribute('data-destino');
            const origem = button.getAttribute('data-origem');
            const preco = button.getAttribute('data-preco');
            const imagem = button.getAttribute('data-imagem');
            const descricao = button.getAttribute('data-descricao');

            // Preenche as informações no modal
            modalImage.style.backgroundImage = `url('${imagem}')`;
            modalTitulo.textContent = destino;
            modalDescricao.textContent = descricao;
            modalPreco.textContent = `R$ ${preco}`;
            modalRota.textContent = `${origem} para ${destino}`; // <--- LINHA ADICIONADA

            // Mostra o modal
            modal.classList.add('show');
        });
    });

    const closeModal = () => {
        modal.classList.remove('show');
    };

    closeButton.addEventListener('click', closeModal);

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});