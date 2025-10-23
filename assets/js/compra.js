document.addEventListener('DOMContentLoaded', function () {
    const secaoDadosCliente = document.getElementById('dados-cliente');
    const secaoDadosPagamento = document.getElementById('dados-pagamento');
    const btnProsseguir = document.getElementById('btn-prosseguir-pagamento');
    const btnVoltar = document.getElementById('btn-voltar');
    const formCliente = document.getElementById('form-cliente');
    
    // Seletores de Máscaras
    const inputTelefone = document.getElementById('telefone');
    const inputCardNumber = document.getElementById('card-number');
    const inputExpiry = document.getElementById('card-expiry');
    const inputCVC = document.getElementById('card-cvc');

    // Seletores do Método de Pagamento
    const paymentSelector = document.getElementById('payment-method-selector');
    const blocoCartao = document.getElementById('bloco-cartao');
    const blocoPix = document.getElementById('bloco-pix');

    // Seletores do Botão Copiar PIX
    const btnCopyPix = document.querySelector('.btn-copy-pix');
    const pixKeySpan = document.querySelector('.pix-key');

    btnProsseguir.addEventListener('click', function () {
        const inputs = formCliente.querySelectorAll('input[required]');
        let isFormValid = true;
        inputs.forEach(input => {
            if (!input.value) {
                isFormValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '#ccc';
            }
        });

        if (isFormValid) {
            secaoDadosCliente.classList.remove('visivel');
            secaoDadosCliente.classList.add('oculto');
            secaoDadosPagamento.classList.remove('oculto');
            secaoDadosPagamento.classList.add('visivel');
        } else {
            iziToast.error({
                title: 'Erro',
                message: 'Por favor, preencha todos os seus dados para continuar...',
                position: 'topRight'
            });
        }
    });

    btnVoltar.addEventListener('click', function () {
        secaoDadosPagamento.classList.remove('visivel');
        secaoDadosPagamento.classList.add('oculto');
        secaoDadosCliente.classList.remove('oculto');
        secaoDadosCliente.classList.add('visivel');
    });

    // Máscara de Telefone
    inputTelefone.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, '');
        if (valor.length > 11) valor = valor.substring(0, 11);
        if (valor.length > 10) valor = valor.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        else if (valor.length > 6) valor = valor.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
        else if (valor.length > 2) valor = valor.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
        else if (valor.length > 0) valor = valor.replace(/^(\d{0,2})$/, '($1');
        e.target.value = valor;
    });

    // Máscaras de Dados de Pagamento
    inputCardNumber.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, '');
        if (valor.length > 16) valor = valor.substring(0, 16);
        valor = valor.replace(/(\d{4})/g, '$1 ');
        e.target.value = valor.trim();
    });

    inputExpiry.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, '');
        if (valor.length > 4) valor = valor.substring(0, 4);
        if (valor.length > 2) valor = valor.replace(/^(\d{2})(\d{0,2})$/, '$1/$2');
        e.target.value = valor;
    });

    inputCVC.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, '');
        if (valor.length > 4) valor = valor.substring(0, 4);
        e.target.value = valor;
    });

    paymentSelector.addEventListener('change', function (e) {
        const metodoEscolhido = e.target.value;

        if (metodoEscolhido === 'cartao') {
            blocoCartao.classList.add('visivel');
            blocoCartao.classList.remove('oculto');
            blocoPix.classList.add('oculto');
            blocoPix.classList.remove('visivel');
        } else if (metodoEscolhido === 'pix') {
            blocoPix.classList.add('visivel');
            blocoPix.classList.remove('oculto');
            blocoCartao.classList.add('oculto');
            blocoCartao.classList.remove('visivel');
        }
    });

    
    // Copiar chave pix
    btnCopyPix.addEventListener('click', function() {
        const chavePix = pixKeySpan.textContent;

        navigator.clipboard.writeText(chavePix).then(function() {
            iziToast.success({
                title: 'Sucesso!',
                message: 'Chave PIX copiada para a área de transferência.',
                position: 'topRight',
                timeout: 3000
            });
        }).catch(function(err) {
            console.error('Falha ao copiar a chave: ', err);
            iziToast.error({
                title: 'Erro',
                message: 'Não foi possível copiar a chave. Tente manualmente.',
                position: 'topRight'
            });
        });
    });

});