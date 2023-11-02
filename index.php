<?php
    require_once "../../api/config/sessao-vendedor.php";
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiFarma</title>
    <link rel="stylesheet" href="../../style/body.css">
    <link rel="stylesheet" href="../../style/fonts.css">
    <link rel="stylesheet" href="../../style/div-up.css">
    <link rel="stylesheet" href="../../style/icons.css">
    <link rel="stylesheet" href="../../style/resposta-js.css">
    <link rel="stylesheet" href="../../style/side-bar-admin.css">
    <link rel="stylesheet" href="../../style/home-admin.css">
    <link rel="stylesheet" href="../../style/div-center-right.css">
    <link rel="stylesheet" href="../../style/card-item-resumo-home.css">
    <link rel="stylesheet" href="../../style/sms-notificacao.css">
    <link rel="stylesheet" href="../../style/messagebox.css">
</head>
<body>
    <div class="up">
        <nav class="side-bar-admin">
            <h1 class="icon-site"></h1>
            <ul>
                <?php
                    //exibindo o seu nome
                    $nome=explode("/",$_SESSION["usuario"]);
                        echo '<li>
                        <a  href=""><img src="../../images/icons/user.svg" alt="."><span>'.$nome[2].'</span></a>
                    </li>';
                ?>
                <li>
                    <a class="in" href=""><img src="../../images/icons/house-chimney-medical.svg" alt="."><span>Home</span></a>
                </li>
                <li>
                    <a href="ver-medicamentos.php"><img src="../../images/icons/suitcase-medical.svg" alt="."><span>Ver medicamentos</span></a>
                </li>
                <li>
                    <a href="vender.php"><img src="../../images/icons/cart-flatbed-suitcase.svg" alt="."><span>Vender</span></a>
                </li>
                <li>
                    <a href="configuracoes.php"><img src="../../images/icons/gear.svg" alt="."><span>Configurações</span></a>
                </li>
            </ul>
        </nav>
        <div class="center-right">
            <main class="items-body">
                <h2>Home- Resumo de todo sistema</h2>
                <div class="card-item-resumo-home">
                    <img src="../../images/icons/cart-flatbed-suitcase.svg" alt="">
                    <div class="inf-item-resumo-home">
                        <h4>As vendas são:</h4>
                        <div class="inf-flex">
                            <div>
                                Venda <span id="numero-venda">0</span>
                            </div>
                            <div>
                                Devolução <span id="numero-devolucao">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-item-resumo-home">
                    <img src="../../images/icons/suitcase-medical.svg" alt="">
                    <div class="inf-item-resumo-home">
                        <h4>A quantidade <br> de medicamentos:</h4>
                        <div class="inf-flex">
                            <div>
                                <span id="numero-medicamentos">0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-item-resumo-home">
                    <img src="../../images/icons/money-check-dollar.svg" alt="">
                    <div class="inf-item-resumo-home">
                        <h4>O orçamento <br> actual é:</h4>
                        <div class="inf-flex">
                            <div>
                                <span id="orcamento">0kz</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-item-resumo-home">
                    <img src="../../images/icons/users-line.svg" alt="">
                    <div class="inf-item-resumo-home">
                        <h4>Os funcionários são:</h4>
                        <div class="inf-flex">
                            <div>
                                <span id="numero-funcionario">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <main class="sms-notificacao">
                <div class="header-sms-notificacao">
                    <img src="../../images/icons/bell-concierge.svg" alt="">
                    <span>Notificações</span>
                </div>
                <div class="body-sms-notificacao">
                    <div class="nao-tem-sms">Não há SMS</div>
                </div>
            </main>
        </div>
    </div>
    <script src="../../js/mediador-api/main-admin-get-info.js" defer></script>
    <script src="../../js/components/messagebox.js" defer></script>
</body>
</html>