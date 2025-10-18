document.addEventListener('DOMContentLoaded', function () {
    const secaoDadosCliente = document.getElementById('dados-cliente');
    const secaoDadosPagamento = document.getElementById('dados-pagamento');

    const btnProsseguir = document.getElementById('btn-prosseguir-pagamento');
    const btnVoltar = document.getElementById('btn-voltar');

    const formCliente = document.getElementById('form-cliente');

    btnProsseguir.addEventListener('click', function () {
        // Validação simples: verifica se os campos da primeira etapa estão preenchidos
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
            // Esconde a seção de dados do cliente
            secaoDadosCliente.classList.remove('visivel');
            secaoDadosCliente.classList.add('oculto');

            // Mostra a seção de pagamento
            secaoDadosPagamento.classList.remove('oculto');
            secaoDadosPagamento.classList.add('visivel');
        }
    });

    btnVoltar.addEventListener('click', function () {
        secaoDadosPagamento.classList.remove('visivel');
        secaoDadosPagamento.classList.add('oculto');
        
        secaoDadosCliente.classList.remove('oculto');
        secaoDadosCliente.classList.add('visivel');
    });

    const inputTelefone = document.getElementById('telefone');

    inputTelefone.addEventListener('input', function (e) {
        // 1. Obtém o valor atual e remove tudo que não for dígito
        let valor = e.target.value.replace(/\D/g, '');
        
        // 2. Limita o tamanho máximo para 11 dígitos (DDD + 9 + 8 dígitos)
        if (valor.length > 11) {
            valor = valor.substring(0, 11);
        }

        // 3. Aplica a máscara dinamicamente
        if (valor.length > 10) {
            // Formato (00) 90000-0000 (Celular com 9º dígito)
            valor = valor.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        } else if (valor.length > 6) {
            // Formato (00) 0000-0000 (Fixo ou celular incompleto)
            valor = valor.replace(/^(\d{2})(\d{4})(\d{0,4})$/, '($1) $2-$3');
        } else if (valor.length > 2) {
            // Formato (00) 0000
            valor = valor.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
        } else if (valor.length > 0) {
            // Formato (00
            valor = valor.replace(/^(\d{0,2})$/, '($1');
        }

        e.target.value = valor;
    });

    const inputCardNumber = document.getElementById('card-number');
    
    inputCardNumber.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito

        if (valor.length > 16) {
            valor = valor.substring(0, 16); // Limita a 16 dígitos
        }

        // Adiciona um espaço a cada 4 dígitos
        valor = valor.replace(/(\d{4})/g, '$1 ');

        e.target.value = valor.trim(); // .trim() remove o espaço extra no final
    });

    // 2. Máscara da Data de Validade (Formato: MM/AA)
    const inputExpiry = document.getElementById('card-expiry');

    inputExpiry.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, ''); // Remove não-dígitos

        if (valor.length > 4) {
            valor = valor.substring(0, 4); // Limita a 4 dígitos (MMAA)
        }

        // Adiciona a barra '/' após os 2 primeiros dígitos (MM)
        if (valor.length > 2) {
            valor = valor.replace(/^(\d{2})(\d{0,2})$/, '$1/$2');
        }

        e.target.value = valor;
    });

    // 3. Máscara do CVV (Apenas números, limita a 4 dígitos)
    const inputCVC = document.getElementById('card-cvc');

    inputCVC.addEventListener('input', function (e) {
        let valor = e.target.value.replace(/\D/g, ''); // Remove não-dígitos

        if (valor.length > 3) {
            valor = valor.substring(0, 3); // Limita a 4 dígitos (padrão Amex, outros usam 3)
        }

        e.target.value = valor;
    });
});