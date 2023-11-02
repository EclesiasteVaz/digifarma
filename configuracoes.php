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
    <link rel="stylesheet" href="../../style/confirguracoes.css">
    <link rel="stylesheet" href="../../style/financas.css">
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
                    setcookie("digifarma",1);
                ?>
                <li>
                    <a href=""><img src="../../images/icons/house-chimney-medical.svg" alt="."><span>Home</span></a>
                </li>
                <li>
                    <a href="ver-medicamentos.php"><img src="../../images/icons/suitcase-medical.svg" alt="."><span>Ver medicamentos</span></a>
                </li>
                <li>
                    <a href="vender.php"><img src="../../images/icons/cart-flatbed-suitcase.svg" alt="."><span>Vender</span></a>
                </li>
                <li>
                    <a class="in" href="configuracoes.php"><img src="../../images/icons/gear.svg" alt="."><span>Configurações</span></a>
                </li>
            </ul>
        </nav>
        <div class="center-right">
            <div class="config-card">
                <h2>Alterar a sua palavra passe</h2>
                <main>
                    <div>
                        <label for="antigaSenha">A sua palavra passe antiga</label>
                        <input type="password" name="" id="antigaSenha">
                    </div>
                    <div>
                        <label for="senhaNova">Insira a nova senha</label>
                        <input type="password" name="" id="novaSenha">
                    </div>
                    <div>
                        <label for="confirmacao">Confirme, insirindo a nova senha</label>
                        <input type="password" name="" id="confirmacao">
                    </div>
                    <div class="btns">
                        <button type="reset" onclick="reset(0)">Cancelar</button>
                        <button type="button" class="submit" onclick="alterarSenha()">Alterar</button>
                    </div>
                </main>


            </div> 
            <div class="config-card"> 
                <h2>Alterar o seu nome</h2>              
                <main>
                        <div>
                            <label for="nome">Insere o teu novo nome</label>
                            <input type="text" name="" id="nome">
                        </div>
                        <div>
                            <label for="senha">Insere a sua senha</label>
                            <input type="password" name="" id="senha">
                        </div>
                        <div class="btns">
                            <button type="reset" onclick="reset(1)">Cancelar</button>
                            <button type="button" class="submit" onclick="alterarNome()">Alterar</button>
                        </div>
                </main>
            </div>
            <a class="end-session" href="terminar-sessao.php">Terminar Sessão</a>
        </div>
    </div>
    <script src="../../js/mediador-api/main-config.js" defer></script>
    <script src="../../js/components/messagebox.js" defer></script>
</body>
</html>