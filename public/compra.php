<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/imgs/logo-globleng.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/compra.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <title>Pagamento da Passagem</title>
</head>

<body>
    <main>
        <div class="payment-container">
            <div class="card resumo-viagem">
                <h2>Resumo da sua Viagem</h2>
                <div class="destino-header">
                    <img src="../assets/imgs/cards/card-cidade-do-cabo.jpg" alt="Imagem do Destino">
                    <h3>Rio de Janeiro</h3>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-plane-departure"></i>
                    <p><strong>Origem:</strong> São Paulo (GRU)</p>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-calendar-check"></i>
                    <p><strong>Check-in:</strong> 25/12/2025</p>
                </div>
                 <div class="info-item">
                    <i class="fa-solid fa-clock"></i>
                    <p><strong>Tempo de Voo:</strong> 1h 05min</p>
                </div>
                <hr>
                <div class="total-price">
                    <span>Total</span>
                    <strong>R$ 1.250,00</strong>
                </div>
            </div>

            <div class="form-etapas">
                <div id="dados-cliente" class="card form-pagamento visivel">
                    <div class="step-indicator">Etapa 1 de 2: Seus Dados</div>
                    <h2>Informações do Passageiro</h2>
                    <form id="form-cliente">
                        <div class="form-group">
                            <label for="nome-completo">Nome Completo</label>
                            <input type="text" id="nome-completo" name="nome" placeholder="Seu nome como no documento" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" id="telefone" name="telefone" placeholder="(00) 90000-0000" required>
                        </div>
                        <button type="button" id="btn-prosseguir-pagamento" class="btn-pagar">Prosseguir para Pagamento</button>
                    </form>
                </div>

                <div id="dados-pagamento" class="card form-pagamento oculto">
                    <div class="step-indicator">Etapa 2 de 2: Pagamento</div>
                    <h2>Pagamento com Cartão</h2>
                    <div class="card-icons">
                        <i class="fa-brands fa-cc-visa"></i>
                        <i class="fa-brands fa-cc-mastercard"></i>
                    </div>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="card-name">Nome no Cartão</label>
                            <input type="text" id="card-name" placeholder="João M. da Silva" required>
                        </div>
                        <div class="form-group">
                            <label for="card-number">Número do Cartão</label>
                            <input type="text" id="card-number" placeholder="0000 0000 0000 0000" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="card-expiry">Validade</label>
                                <input type="text" id="card-expiry" placeholder="MM/AA" required>
                            </div>
                            <div class="form-group">
                                <label for="card-cvc">CVV</label>
                                <input type="text" id="card-cvc" placeholder="123" required>
                            </div>
                        </div>
                        <button type="button" id="btn-voltar" class="btn-voltar">Voltar e editar dados</button>
                        <button type="submit" class="btn-pagar">Finalizar Pagamento</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include_once '../includes/partials/footer.php'; ?>
    <script src="../assets/js/compra.js"></script>
    <script src="../assets/js/cpf.js"></script>
</body>
</html>