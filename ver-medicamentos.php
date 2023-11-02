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
    <link rel="stylesheet" href="../../style/ver-medicamento.css">
    <link rel="stylesheet" href="../../style/mais-informacao-medicamento.css">
    <link rel="stylesheet" href="../../style/form-medicamento.css">
    <link rel="stylesheet" href="../../style/editar.css">
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
                    <a class="in" href="ver-medicamentos.php"><img src="../../images/icons/suitcase-medical.svg" alt="."><span>Ver medicamentos</span></a>
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
            <main class="items-body" id="main-get-medicamentos">
                <h2>A lista dos seus medicamentos</h2>
            </main>
            
        </div>
    </div>

    <script src="../../js/mediador-api/main-admin-medicamentos.js" defer></script>
    <script src="../../js/components/messagebox.js" defer></script>
    <script src="../../js/components/card-medicamento.js" defer></script>
</body>
</html>