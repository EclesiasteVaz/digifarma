<?php
    require_once "../../api/config/sessao-vendedor.php";
?>
<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender</title>
    <link rel="stylesheet" href="../../style/body.css">
    <link rel="stylesheet" href="../../style/fonts.css">
    <link rel="stylesheet" href="../../style/div-up.css">
    <link rel="stylesheet" href="../../style/icons.css">
    <link rel="stylesheet" href="../../style/resposta-js.css">
    <link rel="stylesheet" href="../../style/side-bar-admin.css">
    <link rel="stylesheet" href="../../style/home-admin.css">
    <link rel="stylesheet" href="../../style/div-center-right.css">
    <link rel="stylesheet" href="../../style/escholha-venda.css">
    <link rel="stylesheet" href="../../style/venda.css">
    <link rel="stylesheet" href="../../style/card-medicamento.css">
    <link rel="stylesheet" href="../../style/messagebox.css">
</head>
<body>
<div class="up">
        <nav class="side-bar-admin">
            <h1 class="icon-site"></h1>
            <ul>
                <?php
                if(isset($_SESSION["usuario"]))
                {
                    //exibindo o seu nome
                    $nome=explode("/",$_SESSION["usuario"]);
                        echo '<li>
                        <a  href=""><img src="../../images/icons/user.svg" alt="."><span>'.$nome[2].'</span></a>
                    </li>';
                }
                ?>
                <li>
                    <a href="index.php"><img src="../../images/icons/house-chimney-medical.svg" alt="."><span>Home</span></a>
                </li>
                <li>
                    <a href="ver-medicamentos.php"><img src="../../images/icons/suitcase-medical.svg" alt="."><span>Ver medicamentos</span></a>
                </li>
                <li>
                    <a class="in" href="vender.php"><img src="../../images/icons/cart-flatbed-suitcase.svg" alt="."><span>Vender</span></a>
                </li>
                <li>
                    <a href="configuracoes.php"><img src="../../images/icons/gear.svg" alt="."><span>Configurações</span></a>
                </li>
            </ul>
        </nav>
        <div class="center-right">
            <main class="items-body" id="main-get-medicamentos">
                <h2>O que pretendes fazer?</h2>
                <div class="escolha">
                    <button type="button" onclick="Venda.main()">Venda</button>
                    <button type="button" onclick="Venda.devolucao()">Devolução</button>
                </div>
                <main id="list-venda">
                    <header>
                        <div>
                            <img src="../../images/icons/chart-line.svg">
                            <h3>Vendas Efectuadas</h3>
                        </div>
                        <button type="button" onclick="verVenda()">
                            Ver mais
                        </button>
                    </header>
                    <article id="main-cards-venda">




                    </article>
                </main>
            </main>
        </div>
    </div>
    <script src="../../js/mediador-api/main-venda.js"defer></script>
    <script src="../../js/components/messagebox.js"></script>
    <script src="../../js/components/venda.js"></script>
</body>
</html>